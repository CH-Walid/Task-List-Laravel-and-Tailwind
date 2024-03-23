@extends('layouts.app')

@section('title', 'Login')
@section('content')
<main>
  <h1 class="h1">Login</h1>

  <form method="POST">
    @csrf
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

    <div class="mb-4">
      <label for="remember" class="label">REMEMBER</label>
      <input type="checkbox" name="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}>
      <span>{{ old('remember') }}</span>
      @error('remember')
        <span class="error">{{$message}}</span>
      @enderror
    </div>


    <div class="flex items-center gap-2">
      <button type="submit" class="btn">Login</button>
    </div>
  </form>
</main>
@endsection