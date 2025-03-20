<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Pengaturan Umum</h3>
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="ceo_name" class="block text-sm font-medium text-gray-700">Nama CEO</label>
                                <input type="text" name="ceo_name" id="ceo_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('ceo_name', $setting->ceo_name ?? '') }}" required>
                                @error('ceo_name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="nama_pengajar" class="block text-sm font-medium text-gray-700">Nama Pengajar</label>
                                <input type="text" name="nama_pengajar" id="nama_pengajar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('nama_pengajar', $setting->nama_pengajar ?? '') }}" required>
                                @error('nama_pengajar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="instansi_pengajar" class="block text-sm font-medium text-gray-700">Instansi Pengajar</label>
                                <input type="text" name="instansi_pengajar" id="instansi_pengajar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('instansi_pengajar', $setting->instansi_pengajar ?? '') }}" required>
                                @error('instansi_pengajar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                                <input type="text" name="tempat" id="tempat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('tempat', $setting->tempat ?? '') }}" required>
                                @error('tempat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="format_tanggal_sertifikat" class="block text-sm font-medium text-gray-700">Format Tanggal Sertifikat</label>
                                <input type="text" name="format_tanggal_sertifikat" id="format_tanggal_sertifikat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('format_tanggal_sertifikat', $setting->format_tanggal_sertifikat ?? 'd F Y') }}" required>
                                <p class="text-xs text-gray-500 mt-1">Contoh: d F Y (01 January 2025)</p>
                                @error('format_tanggal_sertifikat')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <h3 class="text-lg font-semibold mb-4 mt-8">Tanda Tangan Digital</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="ttd_ceo" class="block text-sm font-medium text-gray-700">Tanda Tangan CEO</label>
                                <input type="file" name="ttd_ceo" id="ttd_ceo" class="mt-1 block w-full">
                                @if ($setting && $setting->ttd_ceo_path)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($setting->ttd_ceo_path) }}" alt="TTD CEO" class="h-16">
                                    </div>
                                @endif
                                @error('ttd_ceo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="ttd_pengajar" class="block text-sm font-medium text-gray-700">Tanda Tangan Pengajar</label>
                                <input type="file" name="ttd_pengajar" id="ttd_pengajar" class="mt-1 block w-full">
                                @if ($setting && $setting->ttd_pengajar_path)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($setting->ttd_pengajar_path) }}" alt="TTD Pengajar" class="h-16">
                                    </div>
                                @endif
                                @error('ttd_pengajar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Simpan Pengaturan</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Tema Sertifikat</h3>
                        <a href="{{ route('admin.settings.tema.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Tambah Tema</a>
                    </div>
                    
                    <form method="POST" action="{{ route('admin.settings.tema.update') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="tema_aktif" class="block text-sm font-medium text-gray-700">Tema Aktif</label>
                            <select name="tema_aktif" id="tema_aktif" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @foreach ($tema_sertifikats as $tema)
                                    <option value="{{ $tema->id }}" {{ $tema->is_active ? 'selected' : '' }}>{{ $tema->nama_tema }}</option>
                                @endforeach
                            </select>
                            @error('tema_aktif')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Simpan Tema Aktif</button>
                        </div>
                    </form>
                    
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($tema_sertifikats as $tema)
                            <div class="border rounded-lg overflow-hidden {{ $tema->is_active ? 'border-indigo-500 bg-indigo-50' : 'border-gray-200' }}">
                                <div class="p-4">
                                    <h4 class="font-semibold {{ $tema->is_active ? 'text-indigo-700' : 'text-gray-700' }}">{{ $tema->nama_tema }}</h4>
                                    <p class="text-xs {{ $tema->is_active ? 'text-indigo-600' : 'text-gray-500' }} mt-1">
                                        {{ $tema->is_active ? 'Aktif digunakan' : 'Tidak aktif' }}
                                    </p>
                                </div>
                                <img src="{{ Storage::url($tema->template_path) }}" alt="{{ $tema->nama_tema }}" class="w-full h-32 object-cover">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>