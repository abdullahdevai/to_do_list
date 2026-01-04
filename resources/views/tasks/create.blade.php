<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    <h1>Create</h1>
<div>
<form action="{route('tasks.store')}" method="post">
<div>
        <label for="title" class="block text-sm/6 font-medium">Title</label>
        <div class="mt-2">
            <input type="text"
                class="block w-full rounded-md bg-white/5 px-3 py-1.5 outline-1 -outline-offset-1 outline-black  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
    </div>

    <div>
        <label for="is_active" class="block text-sm/6 font-medium">is_active</label>
        <input type="checkbox" name="" id="">
    </div>
</form>
</div>
</body>

</html>
