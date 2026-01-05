<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">

<div class="bg-white p-6 rounded shadow w-full max-w-md">
    <h1 class="text-xl font-bold mb-4">Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input
                type="text"
                name="title"
                value="{{ $task->title }}"
                class="w-full border px-3 py-2 rounded"
                required
            >
        </div>

        <div class="mb-4 flex items-center gap-2">
            <input
                type="checkbox"
                name="is_completed"
                {{ $task->is_completed ? 'checked' : '' }}
            >
            <label>Completed</label>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('tasks.index') }}" class="text-gray-500">
                Back
            </a>
            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>

</body>
</html>
