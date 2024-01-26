<!-- resources/views/equipos.blade.php -->
@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos de Fútbol</title>
</head>
<body>

    <h1>Match</h1>

    <table>
        <thead>
            <tr>
                <th>Local Team</th>
                <th>Guest Team</th>
                <th>Location</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->teamLocal->name }}</td>
                    <td>{{ $match->teamGuest->name }}</td>
                    <td>{{ $match->result}}</td>
                    <td>{{ $match->date }}</td>
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