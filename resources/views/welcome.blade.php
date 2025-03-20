<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Sertifikat Pelatihan</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="max-w-md mx-auto">
                <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Sistem Sertifikat Pelatihan</h1>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('sertifikat.check') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="no_sertifikat" class="block text-sm font-medium text-gray-700">Nomor Sertifikat</label>
                                <input type="text" name="no_sertifikat" id="no_sertifikat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Masukkan nomor sertifikat">
                                @error('no_sertifikat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Download Sertifikat
                                </button>
                            </div>
                        </form>
                        
                        <div class="mt-4 text-center">
                            @if (Route::has('login'))
                                <div class="text-sm text-gray-500">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-indigo-600 hover:text-indigo-900">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-900">Log in</a>
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>