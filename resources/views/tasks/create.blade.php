@extends('layouts.app')

@section('title', 'Create Task')
@section('content')
<main>
  <h1 class="uppercase mb-4 text-2xl font-bold">Create Task</h1>

  <form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <div class="fmb-4">
      <label for="title" class="block uppercase text-slate-700 mb-2">TITLE</label>
      <input type="text" name="title" @class(['shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none', 'border-red-500' => $errors->has('title')]) value="{{old('title')}}">
      @error('title')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description" class="block uppercase text-slate-700 mb-2">DESCRIPTION</label>
      <input type="text" name="description" value="{{old('description')}}" @class(['shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none', 'border-red-500' => $errors->has('description')])>
      @error('description')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="long_description" class="block uppercase text-slate-700 mb-2">LONG DESCRIPTION</label>
      <textarea name="long_description" id="long_description" cols="30" rows="7" @class(['shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none', 'border-red-500' => $errors->has('long_description')])>{{old('long_description')}}</textarea>
      @error('long_description')
        <span class="text-red-500 text-sm">{{$message}}</span>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Add Task</button>
      <a href="{{url()->previous()}}" class="font-medium text-gray-700 underline decoration-pink-500">Cancel</a>
    </div>
  </form>
</main>
@endsection