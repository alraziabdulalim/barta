@extends('layouts.guest')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="text-center py-12 border border-gray-800 rounded-xl">
            <a href="{{ route('home') }}">
                <h1 class="text-6xl justify-center items-center  font-bold text-gray-900">Barta</h1>
            </a>
            <br class="text-3xl">
            <h3 class="text-xl justify-center items-center">Connecting Local Businesses and Customers</h3>
            <br class="text-3xl">
            <div class="flex space-x-4 mt-4 p-6">
                <a href="{{ route('register') }}"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Registration
                </a>
                <a href="{{ route('login') }}"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Sign in
                </a>
            </div>
        </div>
    </div>
@endsection
