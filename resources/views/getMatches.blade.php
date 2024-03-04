<!-- resources/views/equipos.blade.php -->
@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <h1 class="font-bold text-5xl">Matches</h1>
    </div>
    <div class="mt-8">
        <table class="mt-8 table-auto max-w-screen-lg mx-auto">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Local Team</th>
                    <th class="py-2 px-4 border-b">Guest Team</th>
                    <th class="py-2 px-4 border-b">WINNER</th>
                    <th class="py-2 px-4 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matches as $match)
                <tr>

                    <td class="py-2 px-4 border-b">{{ $match->teamLocal->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $match->teamGuest->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $match->result}}</td>
                    <td class="py-2 px-4 border-b">{{ $match->date }}</td>
                    <form action="{{ route('delete.match', ['id'=> $match->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <td>
                            <button class="rounded-md border bg-yellow-600 px-3 py-2 font-bold" type="submit">Delete</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>
@endsection