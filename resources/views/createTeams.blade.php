@extends('layouts.app')
@section('content')
<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/output.css" rel="stylesheet">
        <title>Formulario de Registro</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body>
        <h1 class="font-bold text-5xl"> CHOOSE YOUR FIGHTER </h1>
        <div class="sm:flex mt-8">

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    title: 'Error',
                    text: '{{ $error }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
            @endforeach
            @endif
            <form method="POST" action="{{ route('team.store') }}" class="space-y-4 sm:w-1/2 sm:max-w-md mt-8">
                @csrf

                <label for="name">Fighter's name:</label>
                <input type="text" id="name" name="name" class="w-full border p-2 rounded sm:w-64 required">

                <label for="power">Set power:</label>
                <input type="number" id="power" name="power" class="w-full border p-2 rounded sm:w-64 required">

                <label for="trainer">Trainer(your name):</label>
                <input type="text" id="trainer" name="trainer" class="w-full border p-2 rounded sm:w-64 required">

                <label for="fighter_image">Fighter:</label>
                <select id="fighter_image" name="fighter_image" class="w-full border p-2 rounded sm:w-64 required">
                    <option value="fighter-1.png">figther 1</option>
                    <option value="fighter-2.png">figther 2</option>
                    <option value="fighter-3.png">figther 3</option>
                    <option value="fighter-4.png">figther 4</option>

                </select>
                <button type="submit" class="rounded-md border bg-yellow-600 px-7 py-4 font-bol mt-8">Save</button>

            </form>
            <div class="sm:w-1/2 sm:max-w-md ml-24">
                <div class="flex flex-col">

                    <div class="flex space-x-4 mb-4">
                        <div class="flex-shrink-0">
                            <img src="/images/fighter-1.png" alt="Fighter 1" class="w-24 h-24 rounded-lg">
                            <p class="text-center text-sm font-bold">1</p>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="/images/fighter-2.png" alt="Fighter 2" class="w-24 h-24 rounded-lg">
                            <p class="text-center text-sm font-bold">2</p>
                        </div>
                    </div>


                    <div class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="/images/fighter-3.png" alt="Fighter 3" class="w-24 h-24 rounded-lg">
                            <p class="text-center text-sm font-bold">3</p>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="/images/fighter-4.png" alt="Fighter 4" class="w-24 h-24 rounded-lg">
                            <p class="text-center text-sm font-bold">4</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </body>

    </html>

</div>
@endsection