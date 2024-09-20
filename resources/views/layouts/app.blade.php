<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barta</title>

    @include('includes.styles')
</head>

<body class="bg-gray-100">
    @auth
        <header>
            <!-- Navigation -->
            <nav x-data="{ mobileMenuOpen: false, userMenuOpen: false }" class="bg-white shadow">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                    @include('partials.navbar.web')
                </div>

                {{-- Mobile menu, show/hide based on menu state. --}}

                @include('partials.navbar.mobile')
            </nav>
        </header>

        <main class="container max-w-xl mx-auto space-y-8 mt-8 px-2 md:px-0 min-h-screen">

            @yield('content')

        </main>

        @include('partials.footer')
    @endauth
</body>

</html>
