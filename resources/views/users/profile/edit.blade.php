@extends('layouts.app')

@section('content')
    <div
        class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[400px] space-y-8 flex items-center flex-col justify-center">
        <div class="space-y-4">
            <div class="border-b border-gray-900/10 pb-4">
                <h2 class="text-xl font-semibold leading-7 text-gray-900">
                    Edit Profile
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    This information will be displayed publicly so be careful what you
                    share.
                </p>
            </div>

            <div class="border-b border-gray-900/10 pb-4">
                @include('users.profile.partials.update-avatar-form')
            </div>

            <div class="border-b border-gray-900/10 pb-4">
                @include('users.profile.partials.update-profile-info-form')
            </div>

            <div class="border-b border-gray-900/10 pb-4">
                @include('users.profile.partials.update-password-form')
            </div>
        </div>
    </div>
@endsection
