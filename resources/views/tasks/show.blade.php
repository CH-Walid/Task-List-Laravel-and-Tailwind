@extends('layouts.app')

@section('content')
<main>
  <h1 class="uppercase mb-4 text-2xl font-bold">{{$task->title}}</h1>

  <nav class="mb-4">
    <a href="{{route('tasks.index')}}" class="font-medium text-gray-700 underline decoration-pink-500">
      Go back to the task list!
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
    <a href="{{route('tasks.edit', $task->id)}}" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Edit</a>
    {{-- mark as completed --}}
    <a href="" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Mark as completed</a>
    {{-- delete --}}
    <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Delete</button>
    </form>
  </div>
</main>
@endsection