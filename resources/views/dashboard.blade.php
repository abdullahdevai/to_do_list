<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body>

    <h1 class="text-center">To-Do List</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Add a new task">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($tasks ?? [] as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <span>
                    <input type="checkbox" {{ $task->is_completed ? 'checked' : '' }}
                        onchange="event.preventDefault(); document.getElementById('update-task-{{ $task->id }}').submit();">
                    {{ $task->title }}
                </span>

                <form id="update-task-{{ $task->id }}" action="{{ route('tasks.update', $task) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                </form>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="margin-left: 10px;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>

            </li>
        @endforeach
    </ul>
</body>

</html>
