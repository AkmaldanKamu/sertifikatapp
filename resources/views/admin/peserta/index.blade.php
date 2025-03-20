<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Peserta') }}
            </h2>
            <a href="{{ route('admin.peserta.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Tambah Peserta</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No Sertifikat</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tema Pelatihan</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($pesertas as $index => $peserta)
                                    <tr>
                                        <td class="py-4 px-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="py-4 px-4 whitespace-nowrap">{{ $peserta->nama }}</td>
                                        <td class="py-4 px-4 whitespace-nowrap">{{ $peserta->no_sertifikat }}</td>
                                        <td class="py-4 px-4 whitespace-nowrap">{{ $peserta->temaSertifikat->nama_tema }}</td>
                                        <td class="py-4 px-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($peserta->tanggal_pelatihan)->format('d M Y') }}</td>
                                        <td class="py-4 px-4 whitespace-nowrap flex space-x-2">
                                            <a href="{{ route('sertifikat.download', $peserta->no_sertifikat) }}" class="text-blue-600 hover:text-blue-900">Download</a>
                                            <a href="{{ route('admin.peserta.edit', $peserta) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form method="POST" action="{{ route('admin.peserta.destroy', $peserta) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">Tidak ada data peserta</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>