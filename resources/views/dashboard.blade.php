<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Data Peserta Card -->
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                            <h3 class="text-lg font-bold mb-4">Data Peserta</h3>
                            <p class="text-gray-600 mb-4">Kelola data peserta pelatihan dan sertifikat</p>
                            <a href="{{ route('admin.peserta.index') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Kelola Data</a>
                        </div>
                        
                        <!-- Settings Card -->
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                            <h3 class="text-lg font-bold mb-4">Pengaturan</h3>
                            <p class="text-gray-600 mb-4">Konfigurasi tema sertifikat, tanda tangan, dan informasi sistem</p>
                            <a href="{{ route('admin.settings.index') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Kelola Pengaturan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>