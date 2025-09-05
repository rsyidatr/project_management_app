<x-minimal-layout>
    <div class="min-h-screen bg-white flex">
        <!-- Sidebar -->
        <div class="w-60 bg-gray-50 border-r border-gray-100 flex flex-col">
            <!-- Header -->
            <div class="p-5 border-b border-gray-100">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-7 h-7 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-lg font-semibold text-gray-800">Notes</h1>
                </div>
                
                <!-- New Note Button with Dropdown -->
                <div class="relative group">
                    <button class="w-full bg-gray-900 text-white px-3 py-2.5 rounded-lg text-sm font-medium flex items-center justify-center gap-2 hover:bg-gray-800 transition-all duration-200 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Note
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                        <button class="w-full px-3 py-2.5 text-left text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg create-note-btn">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Quick Note
                            </div>
                        </button>
                        <a href="{{ route('notes.create') }}" class="block w-full px-3 py-2.5 text-left text-sm text-gray-700 hover:bg-gray-50 rounded-b-lg">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Full Editor
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="p-4 space-y-1">
                <!-- All Notes -->
                <a href="{{ route('notes.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"></path>
                    </svg>
                    All Notes
                </a>

                <!-- Favorites -->
                <a href="{{ route('notes.index', ['view' => 'favorites']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    Favorites
                </a>

                <!-- Archive -->
                <a href="{{ route('notes.index', ['view' => 'archive']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8l6 6 6-6"></path>
                    </svg>
                    Archive
                </a>

                <!-- Folders -->
                @php
                    $folders = \App\Models\Folder::where('workspace_id', 1)->orderBy('sort_order')->withCount('activeNotes')->get();
                @endphp
                
                @if($folders->count() > 0)
                <div class="pt-4">
                    <h3 class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Folders</h3>
                    @foreach($folders as $folder)
                    <a href="{{ route('notes.index', ['folder_id' => $folder->id]) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200">
                        <div class="w-2 h-2 rounded-full" style="background-color: {{ $folder->color }}"></div>
                        {{ $folder->name }}
                        <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $folder->active_notes_count }}</span>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- User Menu -->
            <div class="mt-auto p-4 border-t border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-sm font-medium text-blue-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-700 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="p-1 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-white">
            <!-- Header -->
            <div class="border-b border-gray-100 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('notes.index') }}" class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">{{ $note->title }}</h2>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-medium uppercase tracking-wide">
                                    {{ $note->type }}
                                </span>
                                @if($note->folder)
                                <span class="flex items-center gap-1.5 px-3 py-1 bg-gray-50 text-gray-600 rounded-full text-xs font-medium">
                                    <div class="w-2 h-2 rounded-full" style="background-color: {{ $note->folder->color }}"></div>
                                    {{ $note->folder->name }}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-2">
                        <!-- Favorite Button -->
                        <form action="{{ route('notes.favorite', $note) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200" title="{{ $note->is_favorite ? 'Remove from favorites' : 'Add to favorites' }}">
                                <svg class="w-5 h-5 {{ $note->is_favorite ? 'text-yellow-500 fill-current' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </button>
                        </form>

                        <!-- Edit Button -->
                        <a href="{{ route('notes.edit', $note) }}" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200" title="Edit note">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this note?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors duration-200" title="Delete note">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Note Content -->
            <div class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Note Body -->
                        <div class="p-8">
                            <!-- Tags -->
                            @if($note->tags_count > 0)
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($note->tags_array as $tag)
                                <span class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                                    {{ $tag }}
                                </span>
                                @endforeach
                            </div>
                            @endif

                            <!-- Content -->
                            <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                                {!! nl2br(e($note->content)) !!}
                            </div>
                        </div>

                        <!-- Note Footer -->
                        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>Created {{ $note->created_at->format('M j, Y \a\t g:i A') }}</span>
                                <span>Last updated {{ $note->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Note Modal -->
    <div id="createNoteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl max-w-lg w-full p-6 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Create New Note</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form action="{{ route('notes.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                        <select name="type" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <option value="note">Note</option>
                            <option value="project">Project</option>
                            <option value="meeting">Meeting</option>
                            <option value="goal">Goal</option>
                            <option value="recipe">Recipe</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Folder</label>
                        <select name="folder_id" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <option value="">No Folder</option>
                            @foreach($folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="content" rows="5" placeholder="Write your note content here..." class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"></textarea>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="button" id="cancelModal" class="flex-1 px-4 py-3 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 text-sm font-medium">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-gray-900 text-white px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors duration-200 text-sm font-medium shadow-sm">
                        Create Note
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal elements
            const createNoteBtn = document.querySelector('.create-note-btn');
            const createNoteModal = document.getElementById('createNoteModal');
            const closeModalBtn = document.getElementById('closeModal');
            const cancelModalBtn = document.getElementById('cancelModal');

            // Modal functionality
            if (createNoteBtn && createNoteModal) {
                createNoteBtn.addEventListener('click', function() {
                    createNoteModal.classList.remove('hidden');
                    createNoteModal.classList.add('flex');
                });
            }

            // Close modal function
            function closeModal() {
                if (createNoteModal) {
                    createNoteModal.classList.add('hidden');
                    createNoteModal.classList.remove('flex');
                }
            }

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + N to create new note
                if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                    e.preventDefault();
                    if (createNoteModal) {
                        createNoteModal.classList.remove('hidden');
                        createNoteModal.classList.add('flex');
                        // Focus on title input
                        setTimeout(() => {
                            const titleInput = document.querySelector('input[name="title"]');
                            if (titleInput) titleInput.focus();
                        }, 100);
                    }
                }
                
                // Escape to close modal
                if (e.key === 'Escape') {
                    closeModal();
                }
            });

            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', closeModal);
            }

            if (cancelModalBtn) {
                cancelModalBtn.addEventListener('click', closeModal);
            }

            // Close modal when clicking outside
            if (createNoteModal) {
                createNoteModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal();
                    }
                });
            }
        });
    </script>
</x-minimal-layout>
