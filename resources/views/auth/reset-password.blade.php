@extends('layouts.guest')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="./" class="text-center text-6xl font-bold text-gray-900">
                <h1>Barta</h1>
            </a>

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Reset Password
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <form class="space-y-6" action="{{ route('password.updatebytoken') }}" method="POST" novalidate>
                @csrf
                @method('PATCH')

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="off"
                            required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="token" class="block text-sm font-medium leading-6 text-gray-900">Token</label>
                    <div class="mt-2">
                        <input id="token" name="token" type="text" autocomplete="off"
                            required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="new-password"
                            required
                            class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                        Reset Password
                    </button>
                </div>

                @if (session('password_mail') === 'password-reset-mail')
                    <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)">{{ __('A password reset link has been sent to your email address.') }}</p>
                @endif
            </form>

            @error('error')
                {{ $message }}
            @enderror

            <p class="mt-10 text-center text-sm text-gray-500">
                Remembered your password?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-black hover:text-black">Sign In</a>
            </p>
        </div>
    </div>
@endsection
