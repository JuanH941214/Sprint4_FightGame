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

    <div class="mt-8">
        <table class="table-auto max-w-screen-lg mx-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b"></th>
                    <th class="py-2 px-4 border-b">Figther</th>
                    <th class="py-2 px-4 border-b">Power</th>
                    <th class="py-2 px-4 border-b">Trainer</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr>
                    <td class="py-2 px-4 border-b w-1/10 h-1/10">
                        <img src="/images/{{ $team->fighter_image }}" alt="Fighter 3" class="w-full object-cover rounded-lg mb-4 m-0">
                    </td>
                    <td class="py-2 px-4 border-b bg-yellow-600">{{ $team->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $team->power }}</td>
                    <td class="py-2 px-4 border-b bg-yellow-600">{{ $team->trainer }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route ('team.edit',['team' => $team->id]) }}">
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button class="rounded-md border bg-yellow-600 px-3 py-2 font-bold w-20" type="button">Edit</button>
                        </a>
                        <form action="{{ route ('delete',['id' => $team->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button type="submit" class="rounded-md border bg-yellow-600 px-3 py-2 font-bold w-20">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
@endsection