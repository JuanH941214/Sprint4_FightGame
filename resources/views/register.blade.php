<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-6">Sign Up</h2>

            <form method="POST" action="{{ route('registrar') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium">Name</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm font-medium">Password</label>
                    <input type="password" name="password" id="password" class="form-input mt-1 block w-full" required>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="rounded-md border bg-yellow-600 px-3 py-2 font-bold w-20">send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
