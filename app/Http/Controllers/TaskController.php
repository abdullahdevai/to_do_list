<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
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
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('tasks.index', compact('tasks'));
    }


    public function store(TaskStoreRequest $request)
    {


        Task::create($request->validated());

        return redirect()->route('tasks.index')->withSuccess('Item Added Successfully');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'))->withSuccess('Item Edited Successfully');
    }


    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title ?? $task->title,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index')->withSuccess('List is Updated Successfully');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->withSuccess('Item Deleted Successfully');
    }
}
