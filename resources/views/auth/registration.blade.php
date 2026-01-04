<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registration</title>
</head>

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-black">Sign in</h2>
        </div>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

                <div>
                    <label for="name" class=" block text-sm/6 font-medium">Name</label>
                    <div>
                        <input type="text"
                         name="name"   class="block w-full rounded-md bg-white/5 px-3 py-1.5 outline-1 -outline-offset-1">
                        @error('name')
                        <p class="text-red-400">{{ $message }}</p>
                         @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium">Email address</label>
                    <div class="mt-2">
                        <input type="email"
                          name="email"  class="block w-full rounded-md bg-white/5 px-3 py-1.5 outline-1 -outline-offset-1 outline-black  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @error('email')
                        <p class="text-red-400 block">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm/6 font-medium">Phone</label>
                    <div class="mt-2">
                        <input type="text"
                         name="phone"   class="block w-full rounded-md bg-white/5 px-3 py-1.5 outline-1 -outline-offset-1 outline-black  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @error('phone')
                        <p class="text-red-400 block">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium ">Password</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base outline-1 -outline-offset-1 outline-black focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                    @error('password')
                        <p class="text-red-400 block">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold  hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
                        in</button>
                </div>
    </form>

</div>
</form>
</div>

</body>

</html>
