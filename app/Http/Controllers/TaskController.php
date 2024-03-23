<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $user_id = Auth::id();
        $data = $request->validated();
        $data['user_id'] = $user_id;
        $task = Task::create($data);
        return redirect()->route('tasks.show', $task->id)->with('success', 'Task Creatd Successfully!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $data = $request->validated();

        $task->update($data);
        return redirect()->route('tasks.show', $task->id)->with('success', 'Updated successfully!');
    }

    public function destroy(Task $task, Request $request)
    {
        $this->authorize('forceDelete', $task);

        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, $request->user()->password)) {
            return redirect()->back()->withErrors([
                'password' => 'invalid password!'
            ]);
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully!');
    }

    public function toggle_complete(Task $task)
    {
        $this->authorize('update', $task);

        $task->toggle_complete();
        return redirect()->back();
    }
}
