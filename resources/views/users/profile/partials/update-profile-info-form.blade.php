<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                name</label>
            <div class="mt-2">
                <input type="text" name="first_name" id="first_name" autocomplete="given-name"
                    value="{{ $user->first_name }}"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="sm:col-span-3">
            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                name</label>
            <div class="mt-2">
                <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}"
                    autocomplete="family-name"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6"
                    class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
            </div>
        </div>
    </div>

    <div class="col-span-full mt-4">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
            address</label>
        <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" value="{{ $user->email }}"
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="col-span-full mt-4">
        <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Bio</label>
        <div class="mt-2">
            <textarea id="bio" name="bio" rows="3"
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">{{ __('Less Talk, More Code 💻') }}</textarea>
        </div>
        <p class="mt-3 text-sm leading-6 text-gray-600">
            Write a few sentences about yourself.
        </p>
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

    @if (session('profile_info') === 'info-updated')
        <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 2000)">{{ __('Profile info updated successfully.!') }}</p>
    @endif
</form>

@error('profile_info')
    {{ $message }}
@enderror
