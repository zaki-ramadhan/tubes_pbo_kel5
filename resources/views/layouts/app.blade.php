<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>    

    <link rel="icon" href="{{ asset('images/logo_fix.png') }}" type="image/png">
    
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 text-white py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center px-4">
                <h1 class="text-2xl font-semibold">Katering Ibu</h1>
                <nav>
                    @guest
                        @if (!Route::is('login'))
                            <a href="{{ route('login') }}" class="px-4 py-2 rounded hover:bg-blue-500">Login</a>
                        @endif
                        @if (!Route::is('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded hover:bg-blue-500">Register</a>
                        @endif
                    @else
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded hover:bg-blue-500">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded hover:bg-blue-500">Logout</button>
                        </form>
                    @endguest
                </nav>
            </div>
        </header>
        <main class="flex-grow container mx-auto px-4 py-8">
            @yield('content')
        </main>
        <footer class="bg-gray-800 text-white py-3 mt-auto text-xs">
            <div class="container mx-auto px-4 text-center">
                &copy; 2024 Katering Ibu. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>