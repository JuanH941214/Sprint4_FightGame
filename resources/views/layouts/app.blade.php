<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex space-x-8">
                <a href="{{ url('/') }}" class="hover:text-gray-300">Home</a>
                <!--  <a href="{{ url('/createTeams') }}" class="hover:text-gray-300">Show teams</a>-->
                <a href="{{ url('/getMatches') }}" class="hover:text-gray-300">Show matches</a>
                <a href="{{ url('/showTeams') }}" class="hover:text-gray-300">Figthers</a>
                <div class="flex items-center">
            @if (auth()->check())
                <!-- Usuario autenticado, muestra el enlace de Logout con estilo diferente en hover -->
                <a href="{{ url('logout') }}" class="font-bold transition hover:text-yellow-300">Logout</a>
            @else
                <!-- Usuario no autenticado, muestra el enlace de Login con estilo diferente en hover -->
                <a href="{{ url('login') }}" class="font-bold transition hover:text-yellow-300">Login</a>
            @endif
        </div>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main class="flex-grow container mx-auto py-8">
            @yield('content')
        </main>

        <!-- Pie de página -->
        <footer class="bg-gray-800 text-white p-4">
            <div class="container mx-auto">
                <!-- Tu contenido del pie de página aquí -->
            </div>
        </footer>
    </div>
</body>

</html>