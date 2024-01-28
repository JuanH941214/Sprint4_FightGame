@extends('layouts.app')
@section('title', 'Página de Inicio')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Aplicación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Otros enlaces y etiquetas del encabezado -->
</head>

@section('content')
    <div class="text-center">
        <h1 class="text-10xl font-bold text-blue-600">
            SUPER SMASH
        </h1>
    </div>
    <div class="flex justify-center mt-8">
    <img src="/images/boom.gif" alt="gif" class="w-24 h-24">
    </div>

    <div class="flex items-center justify-between  mt-32">

        <a href="{{ url('/createTeams') }}">
            <button class="rounded-md border bg-indigo-50 px-7 py-4 font-bold ">CREATE YOUR FIGHTER</button>
        </a>

        <a href="{{ url('/createMatch') }}">
            <button class="rounded-md border bg-red-600 px-7 py-4 text-white font-bold">PLAY A MATCH</button>
        </a>

        <a href="{{ url('/showTeams') }}">
            <button class="rounded-md border bg-yellow-600 px-7 py-4 font-bold">SHOW YOUR FIGHTERS</button>
        </a>
    </div>    

@endsection
