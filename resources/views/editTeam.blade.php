resources/views/updateTeam.blade.php
@extends('layouts.app')
@section('content')
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Update Team </h3>
      <form action="{{ route('team.update', $team->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">name</label>
          <input type="text" class="form-control" id="name" name="name"
            value="{{ $team->name }}" required>
            <label for="trainer">trainer name</label>
          <input type="text" class="form-control" id="trainer" name="trainer"
            value="{{ $team->trainer }}" required>
        </div>
        <div class="form-group">
          <label for="power">players</label>
          <textarea class="form-control" id="power" name="power" rows="3" required>{{ $team->power }}</textarea>
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Update team</button>
      </form>
    </div>
  </div>
</div>
