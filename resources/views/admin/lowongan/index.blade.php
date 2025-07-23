@extends('layouts.dashboard')

@section('content')
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Kelola Lowongan</h1>
                <p class="text-gray-600">Kelola semua lowongan pekerjaan</p>
            </div>
            <a href="{{ route('admin.lowongan.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Lowongan
            </a>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <form method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari lowongan..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
            </div>

            <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                Cari
            </button>
        </form>
    </div>

    <!-- Jobs Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perusahaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kualifikasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kadaluarsa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($lowongans as $lowongan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $lowongan->posisi ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $lowongan->nama_perusahaan ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $lowongan->lokasi ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($lowongan->deskripsi, 50) ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($lowongan->kualifikasi, 50) ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $lowongan->tanggal_kadaluarsa ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $lowongan->kontak ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="text-primary hover:text-blue-700">Edit</a>
                                    <form method="POST" action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Tidak ada lowongan ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 flex items-center justify-between">
            <div>
                <span class="text-sm text-gray-600">
                    Menampilkan {{ $lowongans->firstItem() ?? 0 }} - {{ $lowongans->lastItem() ?? 0 }} dari {{ $lowongans->total() }} data
                </span>
            </div>
            <div class="flex justify-end">
                <nav class="inline-flex -space-x-px">
                    @if ($lowongans->onFirstPage())
                        <span class="px-3 py-2 ml-0 leading-tight text-gray-400 bg-gray-100 border border-gray-300 rounded-l-lg cursor-not-allowed">&laquo;</span>
                    @else
                        <a href="{{ $lowongans->previousPageUrl() }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100">&laquo;</a>
                    @endif

                    @foreach ($lowongans->getUrlRange(1, $lowongans->lastPage()) as $page => $url)
                        @if ($page == $lowongans->currentPage())
                            <span class="px-3 py-2 leading-tight text-white bg-primary border border-gray-300">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($lowongans->hasMorePages())
                        <a href="{{ $lowongans->nextPageUrl() }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100">&raquo;</a>
                    @else
                        <span class="px-3 py-2 leading-tight text-gray-400 bg-gray-100 border border-gray-300 rounded-r-lg cursor-not-allowed">&raquo;</span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endsection
