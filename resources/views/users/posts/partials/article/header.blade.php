<header>
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">

            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full object-cover"
                    src="{{ 'https://ui-avatars.com/api/?name=' . $post->user->first_name }}"
                    alt="{{ $post->user->first_name }}" />
            </div>

            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                <a href="{{ 'https://github.com/' }}" class="hover:underline font-semibold line-clamp-1">
                    {{ $post->user->first_name . ' ' . $post->user->last_name }}
                </a>

                <a href="{{ 'https://twitter.com/' }}" class="hover:underline text-sm text-gray-500 line-clamp-1">
                    {{ $post->user->username }}
                </a>
            </div>
        </div>

        <div class="flex flex-shrink-0 self-center">
            <div class="relative inline-block text-left">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}">
                        <button type="button"
                            class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                            id="menu-0-button">
                            <span class="sr-only">Edit</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0l-9 9A2 2 0 005 13v2.586A1.5 1.5 0 006.5 17H9a2 2 0 001.414-.586l9-9a2 2 0 000-2.828l-2-2zM10 15H6v-1.414l7.586-7.586 1.414 1.414L10 15zm7.586-7.586l-1.414-1.414 1.293-1.293a1 1 0 111.414 1.414l-1.293 1.293z" />
                            </svg>
                        </button>
                    </a>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        <button type="button"
                            class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                            id="menu-0-button">
                            <span class="sr-only">Show</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 3a1 1 0 011-1h10a1 1 0 011 1v14a1 1 0 01-1 1H3a1 1 0 01-1-1V3zm2 0v14h10V3H4zm1 1h8v1H5V4zM5 8h8v1H5V8zm0 4h8v1H5v-1z" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
