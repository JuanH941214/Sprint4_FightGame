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
    @csrf

    <form method="POST" action="{{ route('registro.submit') }}">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="nombre">Jugadores:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">entrenador:</label>
        <input type="text" id="email" name="email" required>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>

</div>
