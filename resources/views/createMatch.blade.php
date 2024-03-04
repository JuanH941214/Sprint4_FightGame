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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('match.store') }}">
        @csrf

        <h1 class="text-3xl font-bold">SET YOUR FIGHT</h1>

        <div class="form-group mt-8">
            <label for="local_id">Local fighter:</label>
            <select name="local_id" id="local_id" class="form-control">
                @foreach ($availableTeams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group mt-2">
            <label for="guest_id">Guest fighter:</label>
            <select name="guest_id" id="guest_id" class="form-control">
                @foreach ($availableTeams as $team)

                <option value="{{ $team->id }}">{{ $team->name }}</option>

                @endforeach
            </select>
        </div>
        <label for="result" class="hidden"></label>
        <input type="text" id="result" name="result" class="hidden" value="default_value" required>
        <label for="date">Match date:</label>
        <input class="mt-2" type="date" id="date" name="date" required>
        <input class= "hidden" type="number" name="user_id" class="hidden" value="{{$userId}}">


        <div>
            <button type="submit" class="rounded-md border bg-yellow-600 px-7 py-4 font-bold mt-8 "> start fight </button>
        </div>
       
    </form>


</body>

</html>
@endsection