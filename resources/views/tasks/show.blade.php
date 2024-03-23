@extends('layouts.app')

@section('title') {{$task->title}} @endsection
@section('content')
<main>
  <h1 class="uppercase mb-4 text-2xl font-bold">{{$task->title}}</h1>

  <nav class="mb-4">
    <a href="{{route('tasks.index')}}" class="flex flex-row items-center gap-x-1 link">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
      </svg>
      <span>Go back to the task list!</span>
    </a>
  </nav>

  <p class="mb-4 text-slate-700">
    {{$task->description}}
  </p>

  <p class="mb-4 text-slate-700">
    {{$task->long_description}}
  </p>

  <p class="mb-4 text-sm text-slate-500">
    Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}
  </p>

  <p class="mb-4 text-slate-700">
    @if ($task->completed)
      <span class="font-medium text-green-500">Completed</span>
    @else
      <span class="font-medium text-red-500">Not completed</span>
    @endif
  </p>

  <div class="flex items-center gap-2">
    {{-- edit --}}
    <a href="{{route('tasks.edit', $task->id)}}" class="btn">Edit</a>
    {{-- mark as completed --}}
    {{-- <a href="" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Mark as completed</a> --}}
    <form action="{{route('tasks.toggle-complete', $task->id)}}" method="POST">
      @method('PUT')
      @csrf
      <button type="submit" class="btn">{{$task->completed ? 'Mark as uncompleted' : 'Mark as completed'}}</button>
    </form>
    {{-- delete --}}
    <a href="{{ route('auth.delete-confirm', $task->id) }}" class="btn">Delete</a>
    {{-- <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn">Delete</button>
    </form> --}}
  </div>
</main>
@endsection