@extends('layouts.app')

@section('title', 'Task List')
@section('content')
<main>
  <h1 class="uppercase mb-4 text-2xl font-bold">The list of tasks</h1>

  <nav class="mb-4">
    
    
    <a href="{{route('tasks.create')}}" class="flex flex-row items-center font-medium text-gray-700 underline decoration-pink-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      <span>add Task!</span>
    </a>
  </nav>

  @forelse ($tasks as $task)
    <div>
      <a href="{{route('tasks.show', $task->id)}}" @class(['line-through' => $task->completed])>
        {{$task->title}}
      </a>
    </div>
  @empty
    <div>No Tasks to show!</div>
  @endforelse

  @if ($tasks->count())
    <nav class="mt-4">
      {{ $tasks->links() }}
    </nav>
  @endif
</main>
@endsection