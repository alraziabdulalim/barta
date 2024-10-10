<div x-show="mobileMenuOpen" class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 pt-2 pb-3">
        {{-- Current: "bg-gray-50 border-gray-800 text-gray-700", Default: "border-transparent text-gray-500
        hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" --}}
        <a href="{{ route('dashboard') }}"
            class="block border-l-4 border-gray-800 bg-gray-50 py-2 pl-3 pr-4 text-base font-medium text-gray-700">Discover</a>
        <a href="{{ route('dashboard') }}"
            class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">For
            You</a>
        <a href="{{ route('dashboard') }}"
            class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">People</a>
    </div>
    <div class="border-t border-gray-200 pt-4 pb-3">
        <div class="flex items-center px-4">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                    alt="{{ session('fullname') }}" />
            </div>
            <div class="ml-3">
                <div class="text-base font-medium text-gray-800">
                    {{ htmlspecialchars(session('first_name')) }}
                </div>
                <div class="text-sm font-medium text-gray-500">
                    {{ htmlspecialchars(session('email')) }}
                </div>
            </div>
        </div>
        <div class="mt-3 space-y-1">
            <a href="{{ route('posts') }}"
                class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Create
                New Post</a>
            <a href="{{ route('profile') }}"
                class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Your
                Profile</a>
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Edit
                Profile</a>
            <a href="{{ route('logout') }}"
                class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Sign
                out</a>
        </div>
    </div>
</div>
