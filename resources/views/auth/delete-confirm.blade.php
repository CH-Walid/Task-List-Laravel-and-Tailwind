@extends('layouts.app')

@section('title', 'Confirm')
@section('content')
<main>
  <h1 class="h1">Confirm Password</h1>

  <form action="{{ route('tasks.destroy', $id) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="mb-4">
      <label for="password" class="label">PASSWORD</label>
      <input type="password" name="password" @class(['input', 'border-red-500' => $errors->has('password')])>
      @error('password')
        <span class="error">{{$message}}</span>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit" class="btn">Confirm</button>
    </div>
  </form>
</main>
@endsection