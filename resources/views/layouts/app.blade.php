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
            <div class="container mx-auto">
            <a href="{{ url('/') }}" class="hover:text-gray-300">Home</a>
            <a href="{{ url('/createTeams') }}" class="hover:text-gray-300">Show teams</a>
            <a href="{{ url('/getMatches') }}" class="hover:text-gray-300">Show matches</a>
                <!-- Tu contenido de la barra de navegación aquí -->
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
