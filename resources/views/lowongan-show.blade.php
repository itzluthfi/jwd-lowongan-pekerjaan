@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="javascript:history.back()" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-primary to-blue-600 px-6 py-8">
                <div class="text-white">
                    <h1 class="text-3xl font-bold mb-2">{{ $lowongan->posisi }}</h1>
                    <div class="flex items-center space-x-4 text-blue-100">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $lowongan->nama_perusahaan }}
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $lowongan->lokasi }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">Informasi Lowongan</h2>
                        <ul class="text-gray-700 space-y-2">
                            <li><span class="font-medium">Perusahaan:</span> {{ $lowongan->nama_perusahaan }}</li>
                            <li><span class="font-medium">Posisi:</span> {{ $lowongan->posisi }}</li>
                            <li><span class="font-medium">Lokasi:</span> {{ $lowongan->lokasi }}</li>
                            <li><span class="font-medium">Tanggal Kadaluarsa:</span> {{ \Carbon\Carbon::parse($lowongan->tanggal_kadaluarsa)->format('d F Y') }}</li>
                            <li><span class="font-medium">Kontak:</span> {{ $lowongan->kontak }}</li>
                            <li><span class="font-medium">Diposting:</span> {{ $lowongan->created_at ? $lowongan->created_at->format('d F Y H:i') : '-' }}</li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">Deskripsi Pekerjaan</h2>
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($lowongan->deskripsi)) !!}
                        </div>
                        @if ($lowongan->kualifikasi)
                            <h2 class="text-xl font-semibold text-gray-900 mt-6 mb-3">Kualifikasi</h2>
                            <div class="text-gray-700 leading-relaxed">
                                {!! nl2br(e($lowongan->kualifikasi)) !!}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="mailto:{{ $lowongan->kontak ?? '-' }}?subject=Lamaran untuk posisi {{ $lowongan->posisi }}" class="flex-1 bg-primary text-white text-center py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Lamar Sekarang
                        </a>
                        <a href="{{ route('lowongan.index') }}" class="flex-1 border border-gray-300 text-gray-700 text-center py-3 px-6 rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
                            Lihat Lowongan Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
