<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex justify-center p-6">

    <div class="bg-white w-full max-w-xl p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-center">To-Do List</h1>


        <form method="GET" action="{{ route('tasks.index') }}" class="flex mb-4">
            <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search tasks..."
                class="w-full border px-3 py-2 rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r">
                Search
            </button>
        </form>


        <form action="{{ route('tasks.store') }}" method="POST" class="flex mb-4">
            @csrf
            <input type="text" name="title" placeholder="New task..." class="flex-1 border px-3 py-2 rounded-l"
                required>
            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r">
                Add
            </button>
        </form>


        <ul class="space-y-2">
            @forelse ($tasks as $task)
                <li class="flex justify-between items-center border p-2 rounded">
                    <div class="flex items-center gap-2">

                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="is_completed" onchange="this.form.submit()"
                                {{ $task->is_completed ? 'checked' : '' }}>
                        </form>

                        <span class="{{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500 py-4">
                    No tasks found.
                </li>
            @endforelse
        </ul>


        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>

</body>

</html>
