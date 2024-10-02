<form action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="col-span-full">
        <label for="old_password" class="block text-sm font-medium leading-6 text-gray-900">Current Password</label>
        <div class="mt-2">
            <input type="password" name="old_password" id="old_password" autocomplete="old_password"
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="col-span-full">
        <label for="new_password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
        <div class="mt-2">
            <input type="password" name="new_password" id="new_password" autocomplete="new_password"
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6">
        </div>
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

    @if (session('new_password') === 'password-updated')
        <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 2000)">{{ __('Password updated successfully.!') }}</p>
    @endif
</form>

@error('error')
    {{ $message }}
@enderror
