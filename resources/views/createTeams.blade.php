resources/views/welcome.blade.php
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <!-- resources/views/registro.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/output.css" rel="stylesheet">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Registro de equipo </h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif


    <form method="POST" action="{{ route('team.store') }}">
    @csrf
        
        <label for="name">Nombre del equipo:</label>
        <input type="text" id="name" name="name" required>

        <label for="players">Jugadores:</label>
        <input type="text" id="players" name="players" rows = "4" required>

        <label for="trainer">entrenador:</label>
        <input type="text" id="trainer" name="trainer" required>

        <button type="submit" class ="btn btn-primary">Registrar</button>
        
    </form>
    <a href="{{ url('/') }}">
    <button  class ="btn btn-primary">home</button>    
    </a>
</body>
</html>

</div>
