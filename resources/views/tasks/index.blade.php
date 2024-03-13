@extends('layouts.app')

@section('content')
<main>
  <h1 class="uppercase mb-4 text-2xl font-bold">The list of tasks</h1>

  <nav class="mb-4">
    <a href="{{route('tasks.create')}}" class="font-medium text-gray-700 underline decoration-pink-500">add Task!</a>
  </nav>

  @forelse ($tasks as $task)
    <div>
      <a href="{{route('tasks.show', $task->id)}}">
        {{$task->title}}
      </a>
    </div>
  @empty
    <div>No Tasks to show!</div>
  @endforelse
</main>
@endsection