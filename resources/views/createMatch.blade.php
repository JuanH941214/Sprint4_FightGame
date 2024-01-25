<!-- resources/views/equipos.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear partido</title>
</head>

<body>
    <form method="post" action="{{ route('match.store') }}">
        @csrf

        <h1>Partidos de Fútbol</h1>
        <div class="form-group">
            <label for="local_id">Local Team:</label>
            <select name="local_id" id="local_id" class="form-control">
                @foreach ($availableTeams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>         
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="guest_id">Guest Team:</label>
            <select name="guest_id" id="guest_id" class="form-control">
                @foreach ($availableTeams as $team)
        
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                         
                @endforeach
            </select>
        </div>
        <label for="location">location:</label>
        <input type="text" id="location" name="location" required>
        <label for="date">Match date:</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">crear </button>
     </form>
        <a href="{{ url('/') }}">
            <button class="btn btn-primary">home </button>
        </a>

       

</body>

</html>