@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Cari Lowongan Pekerjaan</h1>
            <p class="text-gray-600">Temukan pekerjaan impian Anda dari berbagai perusahaan terpercaya</p>
        </div>

        <!-- Search Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
            <form method="GET" action="{{ route('lowongan.index') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" placeholder="Cari posisi, perusahaan, atau kata kunci..." value="{{ request('search') }}" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                    </div>
                </div>
                <div class="md:w-48">
                    <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="kadaluarsa" {{ request('status') == 'kadaluarsa' ? 'selected' : '' }}>Kadaluarsa</option>
                    </select>
                </div>
                <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Cari
                </button>
            </form>
        </div>

        <!-- Results Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        @if (request('search'))
                            Hasil pencarian "{{ request('search') }}"
                        @else
                            Semua Lowongan
                        @endif
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Menampilkan {{ $lowongans->count() }} dari {{ $lowongans->total() }} lowongan
                        @if (request('location'))
                            di {{ request('location') }}
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Job Cards -->
        <div class="space-y-6">
            @forelse ($lowongans as $lowongan)
                <div class="bg-white border border-gray-200 rounded-lg hover:shadow-lg transition-all duration-200 overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                            <div class="flex-1">
                                <!-- Job Header -->
                                <div class="mb-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <h3 class="text-xl font-semibold text-gray-900 hover:text-primary transition-colors duration-200">
                                            <a href="{{ route('lowongan.show', $lowongan->id) }}">{{ $lowongan->posisi }}</a>
                                        </h3>
                                        @if ($lowongan->tanggal_kadaluarsa >= now())
                                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Aktif</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Kadaluarsa</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            {{ $lowongan->nama_perusahaan }}
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $lowongan->lokasi }}
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Kadaluarsa: {{ \Carbon\Carbon::parse($lowongan->tanggal_kadaluarsa)->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="mb-4">
                                    <p class="text-gray-700 mb-3 leading-relaxed">{{ Str::limit($lowongan->deskripsi, 200) }}</p>

                                    @if ($lowongan->kualifikasi)
                                        <div class="mb-3">
                                            <span class="text-sm font-medium text-gray-900">Kualifikasi: </span>
                                            <span class="text-sm text-gray-700">{{ Str::limit($lowongan->kualifikasi, 150) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Job Footer -->
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-4 border-t border-gray-100">
                                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                                        <span>Diposting {{ \Carbon\Carbon::parse($lowongan->created_at)->locale('id')->diffForHumans() }}</span>
                                        @if ($lowongan->kontak)
                                            <span>•</span>
                                            <span>Kontak: {{ $lowongan->kontak }}</span>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('lowongan.show', $lowongan->id) }}" class="inline-flex items-center px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada lowongan ditemukan</h3>
                    <p class="text-gray-600 mb-4">
                        @if (request('search'))
                            Coba ubah kata kunci pencarian atau lokasi yang Anda gunakan.
                        @else
                            Belum ada lowongan yang tersedia saat ini.
                        @endif
                    </p>
                    @if (request()->hasAny(['search', 'location']))
                        <a href="{{ route('lowongan.index') }}" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset Pencarian
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($lowongans->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                    {{ $lowongans->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
