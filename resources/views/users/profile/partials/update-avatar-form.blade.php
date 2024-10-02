<form action="{{ route('avatar.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-span-full mt-4">
        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
        <div class="mt-2 flex items-center gap-x-3">
            <input class="hidden" type="file" name="avatar" id="avatar" />
            <img class="h-12 w-12 rounded-full"
                src="{{ 'https://ui-avatars.com/api/?name=' . auth()->user()->first_name }}"
                alt="{{ auth()->user()->first_name }}" />

            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                    clip-rule="evenodd" />
            </svg>
            <label for="avatar">
                <div
                    class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    Change
                </div>
            </label>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                Cancel
            </button>
            <button type="submit"
                class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                Update
            </button>
        </div>
    </div>

    @if (session('status') === 'avatar-updated')
        <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 2000)">{{ __('Profile Picture updated successfully.!') }}</p>
    @endif
</form>

@error('avatar')
    {{ $message }}
@enderror
