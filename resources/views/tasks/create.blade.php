@extends('layouts.app')

@section('title', 'Create Task')
@section('content')
<main>
  <h1 class="h1">Create Task</h1>

  <form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <div class="fmb-4">
      <label for="title" class="label">TITLE</label>
      <input type="text" name="title" @class(['input', 'border-red-500' => $errors->has('title')]) value="{{old('title')}}">
      @error('title')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description" class="label">DESCRIPTION</label>
      <input type="text" name="description" value="{{old('description')}}" @class(['input', 'border-red-500' => $errors->has('description')])>
      @error('description')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="long_description" class="label">LONG DESCRIPTION</label>
      <textarea name="long_description" id="long_description" cols="30" rows="7" @class(['textarea', 'border-red-500' => $errors->has('long_description')])>{{old('long_description')}}</textarea>
      @error('long_description')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit" class="btn">Add Task</button>
      <a href="{{url()->previous()}}" class="link">Cancel</a>
    </div>
  </form>
</main>
@endsection