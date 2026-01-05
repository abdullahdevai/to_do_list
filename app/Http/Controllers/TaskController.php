<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search ?? '';

        $tasks = Task::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })

            ->orderBy('created_at', 'desc')
            ->paginate(5);
            // ->appends(['search' => $search]);

        return view('tasks.index', compact('tasks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        Task::create(['title' => $request->title]);

        return redirect()->route('tasks.index');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title ?? $task->title,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
