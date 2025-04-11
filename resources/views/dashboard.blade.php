<x-app-layout>
    <div class="bg-gray-800 p-6 rounded shadow">
        <h3 class="text-xl font-semibold text-emerald-400">Welcome back!</h3>
        <p class="mt-2 text-gray-300">You're logged in as <strong>{{ Auth::user()->name }}</strong>.</p>
    </div>
</x-app-layout>
