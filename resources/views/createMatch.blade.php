<!-- resources/views/equipos.blade.php -->
@extends('layouts.app')
@section('content')
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

        <h1 class="text-3xl font-bold">FIGHT</h1>
        <div class="form-group">
            <label for="local_id">Local FIGHTER:</label>
            <p class="form-control">
                @foreach ($availableTeams as $team)
                {{ $team->power }}   
                @endforeach
            </p>
        </div>

        <div class="form-group">
            <label for="local_id">Local FIGHTER:</label>
            <select name="local_id" id="local_id" class="form-control">
                @foreach ($availableTeams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>         
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="guest_id">Guest FIGHTER:</label>
            <select name="guest_id" id="guest_id" class="form-control">
                @foreach ($availableTeams as $team)
        
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                         
                @endforeach
            </select>
        </div>
        <label for="result" class= "hidden"></label>
        <input type="text" id="result" name="result" class="hidden"required>
        <label for="date">Match date:</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">fight </button>
     </form>
        <a href="{{ url('/') }}">
            <button class="btn btn-primary">home </button>
        </a>

       

</body>

</html>
@endsection