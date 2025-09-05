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
                <a href="{{ route('notes.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200 {{ !request()->has('view') && !request()->has('folder_id') ? 'bg-white shadow-sm font-medium' : '' }}">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2z"></path>
                    </svg>
                    All Notes
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $stats['all_notes'] }}</span>
                </a>

                <!-- Favorites -->
                <a href="{{ route('notes.index', ['view' => 'favorites']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200 {{ request('view') === 'favorites' ? 'bg-white shadow-sm font-medium' : '' }}">
                    <svg class="w-4 h-4 text-gray-500" fill="{{ request('view') === 'favorites' ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    Favorites
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $stats['favorites'] }}</span>
                </a>

                <!-- Archive -->
                <a href="{{ route('notes.index', ['view' => 'archive']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200 {{ request('view') === 'archive' ? 'bg-white shadow-sm font-medium' : '' }}">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8l6 6 6-6"></path>
                    </svg>
                    Archive
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $stats['archived'] }}</span>
                </a>
            </div>

            <!-- Folders Section -->
            <div class="px-4 py-2 flex-1">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Folders</h3>
                    <button onclick="document.getElementById('createFolderModal').showModal()" class="p-1 hover:bg-gray-200 rounded-md transition-colors duration-200">
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="space-y-1">
                    @foreach($folders as $folder)
                    <a href="{{ route('notes.index', ['folder_id' => $folder->id]) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 hover:bg-white hover:shadow-sm transition-all duration-200 {{ request('folder_id') == $folder->id ? 'bg-white shadow-sm font-medium' : '' }}">
                        <div class="w-2 h-2 rounded-full flex-shrink-0" style="background-color: {{ $folder->color }}"></div>
                        <span class="truncate">{{ $folder->name }}</span>
                        <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $folder->active_notes_count }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-700 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-white">
            <!-- Header -->
            <div class="border-b border-gray-100 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">
                            @if(request('view') === 'favorites')
                                Favorites
                            @elseif(request('view') === 'archive')
                                Archive
                            @elseif(request('folder_id'))
                                {{ $folders->firstWhere('id', request('folder_id'))->name ?? 'Unknown Folder' }}
                            @else
                                All Notes
                            @endif
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">{{ $notes->total() }} {{ Str::plural('note', $notes->total()) }}</p>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search notes..." class="w-64 pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        
                        <!-- View Toggle -->
                        <div class="flex border border-gray-200 rounded-lg overflow-hidden">
                            <button class="p-2.5 bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </button>
                            <button class="p-2.5 hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h2a2 2 0 002-2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes Grid -->
            <div class="flex-1 p-6 bg-gray-50">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @forelse($notes as $note)
                    <div class="group bg-white rounded-xl border border-gray-100 p-5 hover:border-gray-200 hover:shadow-md transition-all duration-300 cursor-pointer" onclick="window.location='{{ route('notes.show', $note) }}'">
                        <!-- Note Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-2 flex-1 min-w-0">
                                @if($note->type === 'project')
                                    <div class="w-2.5 h-2.5 bg-purple-500 rounded-full flex-shrink-0"></div>
                                @elseif($note->type === 'meeting')
                                    <div class="w-2.5 h-2.5 bg-blue-500 rounded-full flex-shrink-0"></div>
                                @elseif($note->type === 'goal')
                                    <div class="w-2.5 h-2.5 bg-yellow-500 rounded-full flex-shrink-0"></div>
                                @elseif($note->type === 'recipe')
                                    <div class="w-2.5 h-2.5 bg-green-500 rounded-full flex-shrink-0"></div>
                                @else
                                    <div class="w-2.5 h-2.5 bg-gray-400 rounded-full flex-shrink-0"></div>
                                @endif
                                <h3 class="font-medium text-gray-900 truncate text-sm">{{ $note->title }}</h3>
                            </div>
                            
                            <form action="{{ route('notes.favorite', $note) }}" method="POST" onclick="event.stopPropagation();" class="ml-2">
                                @csrf
                                <button type="submit" class="p-1 hover:bg-gray-100 rounded-md transition-colors duration-200 opacity-0 group-hover:opacity-100">
                                    <svg class="w-4 h-4 {{ $note->is_favorite ? 'text-yellow-500 fill-current' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Note Content Preview -->
                        <div class="text-sm text-gray-600 mb-4 line-clamp-4 leading-relaxed">
                            {{ Str::limit(strip_tags($note->content), 120) }}
                        </div>

                        <!-- Note Tags -->
                        @if($note->tags_count > 0)
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach(array_slice($note->tags_array, 0, 2) as $tag)
                            <span class="px-2.5 py-1 bg-gray-100 text-xs text-gray-600 rounded-md font-medium">{{ $tag }}</span>
                            @endforeach
                            @if($note->tags_count > 2)
                            <span class="px-2.5 py-1 bg-gray-100 text-xs text-gray-500 rounded-md">+{{ $note->tags_count - 2 }}</span>
                            @endif
                        </div>
                        @endif

                        <!-- Note Footer -->
                        <div class="flex items-center justify-between text-xs text-gray-400">
                            <span>{{ $note->updated_at->diffForHumans() }}</span>
                            @if($note->folder)
                            <span class="flex items-center gap-1.5">
                                <div class="w-2 h-2 rounded-full" style="background-color: {{ $note->folder->color }}"></div>
                                {{ $note->folder->name }}
                            </span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">No notes yet</h3>
                        <p class="text-gray-500 mb-6 max-w-sm mx-auto">Get started by creating your first note to organize your thoughts and ideas.</p>
                        <button class="bg-gray-900 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors duration-200 shadow-sm create-note-btn">
                            Create Your First Note
                        </button>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($notes->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $notes->links() }}
                </div>
                @endif
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
        
            // Search and filter functionality
            const searchInput = document.getElementById('searchInput');
            const typeFilter = document.getElementById('typeFilter');
            const folderFilter = document.getElementById('folderFilter');
            const notes = document.querySelectorAll('.note-card');

            function filterNotes() {
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
                const selectedType = typeFilter ? typeFilter.value : '';
                const selectedFolder = folderFilter ? folderFilter.value : '';

                notes.forEach(note => {
                    const titleElement = note.querySelector('.note-title');
                    const contentElement = note.querySelector('.note-content');
                    
                    const title = titleElement ? titleElement.textContent.toLowerCase() : '';
                    const content = contentElement ? contentElement.textContent.toLowerCase() : '';
                    const type = note.dataset.type || '';
                    const folder = note.dataset.folder || '';

                    const matchesSearch = searchTerm === '' || title.includes(searchTerm) || content.includes(searchTerm);
                    const matchesType = selectedType === '' || type === selectedType;
                    const matchesFolder = selectedFolder === '' || folder === selectedFolder;

                    if (matchesSearch && matchesType && matchesFolder) {
                        note.style.display = 'block';
                    } else {
                        note.style.display = 'none';
                    }
                });
            }

            if (searchInput) searchInput.addEventListener('input', filterNotes);
            if (typeFilter) typeFilter.addEventListener('change', filterNotes);
            if (folderFilter) folderFilter.addEventListener('change', filterNotes);
        });
    </script>
</x-minimal-layout>
