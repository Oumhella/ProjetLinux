<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PenguinShop') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans">
<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 p-4">
        <h1 class="text-2xl font-bold text-emerald-400 mb-6">PenguinShop</h1>
        <nav class="space-y-4">
            <a href="/dashboard" class="block px-3 py-2 rounded bg-gray-700 text-white hover:bg-emerald-500">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-gray-700">Settings</a>
            <a href="/profile/edit" class="block px-3 py-2 rounded hover:bg-gray-700">Profile</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Navbar -->
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold">Dashboard</h2>
            <div>
                <span class="mr-4 text-gray-400">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Logout</button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        {{ $slot }}
    </main>
</div>
</body>
</html>
