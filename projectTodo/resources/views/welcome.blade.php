<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    </head>
    <body class="bg-gray-600 p-4">
        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-red-100 rounded-xl">
            <h1 class="text-5xl text-blue-900 text-center mb-8">Laravel Todo List</h1>
            <div class="mb-6">
                <form action="/" class="flex flex-col space-y-4" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Todo title" class="py-3 px-4 bg-gray-200 rounded-xl">
                    <textarea name="description" placeholder="Todo description" class="py-3 px-4 bg-gray-200 rounded-xl"></textarea>
                    <button class="w-28 py-4 px-8 bg-blue-500 text-white rounded-xl">Add</button>
                </form>
            </div>

            <hr>

            <div class="mt-2">
                @foreach ($todos as $todo)
                <div 
                @class([
                    'py-4 flex items-center border-b border-red-600 px-3',
                $todo->isDone ? 'bg-green-200' : ''
                ])
                >
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                        <p class="text-gray-500">{{ $todo->description }}</p>
                    </div>

                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todo->id }}">
                            @csrf
                            @method('PATCH')
                            <button class="py-2 px-2 bg-blue-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </form>
                        <form method="POST" action="/{{ $todo->id }}">
                             @csrf
                            @method('DELETE')
                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
    </body>
</html>
