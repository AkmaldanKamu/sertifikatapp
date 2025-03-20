<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-indigo-800 text-white min-h-screen p-4">
                <div class="text-2xl font-bold mb-8 pb-4 border-b border-indigo-700">Sistem Sertifikat</div>
                
                <nav>
                    <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.peserta.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.peserta.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }}">
                        Data Peserta
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-700' : 'hover:bg-indigo-700' }}">
                        Pengaturan
                    </a>
                </nav>
                
                <div class="mt-auto pt-4 border-t border-indigo-700 absolute bottom-0 w-56 mb-6">
                    <div class="px-4 py-2">
                        <div class="text-sm font-medium text-indigo-300">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-indigo-400">{{ Auth::user()->email }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-indigo-300 hover:bg-indigo-700 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
</html>