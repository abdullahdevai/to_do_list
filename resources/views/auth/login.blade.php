<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Log in
        </h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf


            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email address
                </label>
                <input type="email" name="email"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                           focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password"
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                           focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit"
                class="w-full rounded-md bg-indigo-600 py-2 text-white font-semibold
                       hover:bg-indigo-500 transition focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Log in
            </button>
        </form>
    </div>

</body>

</html>
