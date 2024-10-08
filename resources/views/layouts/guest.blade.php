<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barta</title>

    @include('includes.styles')
</head>

<body class="bg-gray-100">
    <header>
        {{-- Nav Bar --}}
    </header>

    <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

        @yield('content')

    </main>

@include('partials.footer')
</body>

</html>
