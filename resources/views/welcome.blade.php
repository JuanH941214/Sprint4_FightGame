@extends('layouts.app')
@section('title', 'Página de Inicio')


@section('content')
    <h1 class="text-3xl font-bold underline">
        LIGA DE FUTBOL
    </h1>
    <a href="{{ url('/createTeams') }}">
        <button>create new Team</button> 
    </a>

    <a href="{{ url('/showTeams') }}">
        <button class="btn btn-primary">Show Football Teams</button>    
    </a>
    <a href="{{ url('/createMatch') }}">
        <button class="btn btn-primary">matches</button>    
    </a>

@endsection