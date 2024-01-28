@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="flex justify-center">
    <div class="w-full md:w-2/3 lg:w-1/2">
      <h3 class="font-bold text-5xl mb-4">Edit Fighter</h3>
      <form action="{{ route('team.update', $team->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Fighter Name:</label>
          <input type="text" class="mt-1 p-2 w-full border rounded-md" id="name" name="name" value="{{ $team->name }}" required>
        </div>
        <div class="mb-4">
          <label for="trainer" class="block text-sm font-medium text-gray-700">Trainer Name:</label>
          <input type="text" class="mt-1 p-2 w-full border rounded-md" id="trainer" name="trainer" value="{{ $team->trainer }}" required>
        </div>
        <div class="mb-4">
          <label for="power" class="block text-sm font-medium text-gray-700">Set Power:</label>
          <input type="number" class="mt-1 p-2 w-full border rounded-md" id="power" name="power" value="{{ $team->power }}" required>
        </div>
        <button type="submit" class="rounded-md border bg-yellow-600 px-3 py-2 font-bold">Update Team</button>
      </form>
    </div>
  </div>
</div>
@endsection
