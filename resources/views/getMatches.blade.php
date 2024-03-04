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
    <h1 class="font-bold text-5xl">Match</h1>
    <table class="mt-8">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b" >Local Team</th>
                <th class="py-2 px-4 border-b" >Guest Team</th>
                <th class="py-2 px-4 border-b" >WINNER</th>
                <th class="py-2 px-4 border-b" >Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    
                    <td>{{ $match->teamLocal->name }}</td>
                    <td>{{ $match->teamGuest->name }}</td>
                    <td>{{ $match->result}}</td>
                    <td>{{ $match->date }}</td>
                    <form action="{{ route('delete.match', ['id'=> $match->id]) }}" method="post" >
                    @csrf
                    @method('DELETE')
                    <td>
                    <button class ="rounded-md border bg-yellow-600 px-3 py-2 font-bold" type="submit">Delete</button></td>  
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
 

</body>
</html>
@endsection