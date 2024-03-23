@extends('layouts.app')

@section('title', 'Register')
@section('content')
<main>
  <h1 class="h1">Register</h1>

  <form method="POST">
    @csrf
    <div class="mb-4">
      <label for="name" class="label">NAME</label>
      <input type="name" name="name" @class(['input', 'border-red-500' => $errors->has('name')]) value="{{old('name')}}">
      @error('name')
        <span class="error">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="email" class="label">EMAIL</label>
      <input type="email" name="email" @class(['input', 'border-red-500' => $errors->has('email')]) value="{{old('email')}}">
      @error('email')
        <span class="error">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="password" class="label">PASSWORD</label>
      <input type="password" name="password" @class(['input', 'border-red-500' => $errors->has('password')])>
      @error('password')
        <span class="error">{{$message}}</span>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit" class="btn">Register</button>
    </div>
  </form>
</main>
@endsection