@extends('layouts.app')
@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Temukan Pekerjaan Impian Anda</h1>
        <p class="text-xl text-gray-600 mb-8">Ribuan lowongan pekerjaan menanti Anda</p>
        
        <div class="max-w-2xl mx-auto">
            <form method="GET" action="{{ route('lowongan.index') }}">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari pekerjaan..." class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                    <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- main content -->
    <div class="bg-white rounded-lg shadow-sm p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Lowongan Terbaru</h2>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($lowongans as $lowongan)
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $lowongan->posisi }}</h3>
                            <p class="text-gray-600">{{ $lowongan->nama_perusahaan }}</p>
                        </div>
                        @if ($lowongan->tanggal_kadaluarsa >= now())
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Kadaluarsa</span>
                        @endif
                    </div>
                    <p class="text-gray-600 text-sm mb-4">{{ $lowongan->lokasi }}</p>
                    <p class="text-gray-700 text-sm mb-4">{{ $lowongan->deskripsi }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-semibold">{{ $lowongan->kontak }}</span>
                        <a href="{{ route('lowongan.show', $lowongan->id) }}" class="text-primary hover:text-blue-700 font-medium text-sm">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('lowongan.index') }}" class="inline-flex items-center bg-gray-100 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">
                Lihat Semua Lowongan
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>

            </a>
        </div>
    </div>
@endsection
