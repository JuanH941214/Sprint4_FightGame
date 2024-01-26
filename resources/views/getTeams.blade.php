<!-- resources/views/equipos.blade.php -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de Fútbol</title>
</head>
<body>

    <h1>Equipos de Fútbol</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre de equipo</th>
                <th>Jugadores</th>
                <th>Entrenador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->power }}</td>
                    <td>{{ $team->trainer }}</td>
                    <td>
                        <a href="{{ route ('team.edit',['team' => $team->id]) }}">
                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button type="button">Editar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}">
    <button  class ="btn btn-primary">home </button>    
    </a>

</body>
</html>
@endsection