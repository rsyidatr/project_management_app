<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $currentWorkspaceId = 1; // For now, we'll use a default workspace
        
        // Get folders for sidebar
        $folders = Folder::where('workspace_id', $currentWorkspaceId)
            ->orderBy('sort_order')
            ->withCount('activeNotes')
            ->get();

        // Get notes based on filter
        $notesQuery = Note::where('workspace_id', $currentWorkspaceId)
            ->where('is_archived', false)
            ->with(['folder', 'user'])
            ->latest();

        // Apply filters
        if ($request->has('folder_id') && $request->folder_id) {
            $notesQuery->where('folder_id', $request->folder_id);
        }

        if ($request->has('view') && $request->view === 'favorites') {
            $notesQuery->where('is_favorite', true);
        }

        if ($request->has('view') && $request->view === 'archive') {
            $notesQuery->where('is_archived', true);
        }

        $notes = $notesQuery->paginate(12);

        // Statistics for dashboard
        $stats = [
            'all_notes' => Note::where('workspace_id', $currentWorkspaceId)->where('is_archived', false)->count(),
            'favorites' => Note::where('workspace_id', $currentWorkspaceId)->where('is_favorite', true)->count(),
            'archived' => Note::where('workspace_id', $currentWorkspaceId)->where('is_archived', true)->count(),
        ];

        return view('notes.index', compact('notes', 'folders', 'stats'));
    }

    public function create()
    {
        $folders = Folder::where('workspace_id', 1)->get();
        return view('notes.create', compact('folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'type' => 'nullable|string',
            'folder_id' => 'nullable|exists:folders,id',
            'tags' => 'nullable|array'
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type ?? 'note',
            'folder_id' => $request->folder_id,
            'workspace_id' => 1,
            'user_id' => Auth::id(),
            'tags' => $request->tags
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $folders = Folder::where('workspace_id', 1)->get();
        return view('notes.edit', compact('note', 'folders'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'type' => 'nullable|string',
            'folder_id' => 'nullable|exists:folders,id',
            'tags' => 'nullable|array'
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type ?? 'note',
            'folder_id' => $request->folder_id,
            'tags' => $request->tags
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }

    public function toggleFavorite(Note $note)
    {
        $note->update(['is_favorite' => !$note->is_favorite]);
        return back();
    }

    public function archive(Note $note)
    {
        $note->update(['is_archived' => true]);
        return redirect()->route('notes.index')->with('success', 'Note archived successfully!');
    }
}
