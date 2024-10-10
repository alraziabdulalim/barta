@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <div
            class="bg-white border-2 p-8 border-gray-800 rounded-xl min-h-[400px] space-y-8 flex items-center flex-col justify-center">

            <div class="flex gap-4 justify-center flex-col text-center items-center">

                <div class="relative">
                    <img class="w-32 h-32 rounded-full border-2 border-gray-800" src="{{ asset('storage/' . $user->avatar) }}"
                        alt="{{ $user->first_name . ' ' . $user->last_name }}" />
                    <span
                        class="bottom-2 right-4 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                </div>


                <div>
                    <h1 class="font-bold md:text-2xl">{{ $user->first_name . ' ' . $user->last_name }}</h1>
                    <p class="text-gray-700">{{ __('Less Talk, More Code 💻') }}</p>
                </div>
            </div>

            <div class="flex flex-row gap-16 justify-center text-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <h4 class="sm:text-xl font-bold">{{ __('405') }}</h4>
                    <p class="text-gray-600">{{ __('Posts') }}</p>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <h4 class="sm:text-xl font-bold">{{ __('1,334') }}</h4>
                    <p class="text-gray-600">{{ __('Friends') }}</p>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <h4 class="sm:text-xl font-bold">{{ __('18,589') }}</h4>
                    <p class="text-gray-600">{{ __('Followers') }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="pagination">
        {{ $users->appends(request()->input())->links() }}
    </div>
@endsection
