<!-- resources/views/equipos.blade.php -->
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <h1 class="font-bold text-5xl">Figthers</h1>

    <table class="mt-8">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b" >Figther</th>
                <th class="py-2 px-4 border-b">Power</th>
                <th class="py-2 px-4 border-b">Trainer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td class="py-2 px-4 border-b bg-yellow-600">{{ $team->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $team->power }}</td>
                    <td class="py-2 px-4 border-b bg-yellow-600">{{ $team->trainer }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route ('team.edit',['team' => $team->id]) }}">
                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button type="button">Editar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
@endsection