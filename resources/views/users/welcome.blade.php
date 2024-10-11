@extends('layouts.app')

@section('content')
    <div class="text-center p-12 border border-gray-800 rounded-xl"  x-data="{ show: true }" x-show="show" x-transition
    x-init="setTimeout(() => show = false, 4000)">
        <h1 class="text-3xl justify-center items-center">
            Welcome to Barta, {{ htmlspecialchars(session('first_name')) }}!
        </h1>
    </div>

    @include('users.posts.partials.articles')
@endsection
