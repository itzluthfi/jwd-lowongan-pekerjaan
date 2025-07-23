@extends('layouts.dashboard')

@section('content')
    <div class="mb-8">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.lowongan.index') }}" class="text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Lowongan Baru</h1>
                <p class="text-gray-600">Buat lowongan pekerjaan baru</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form method="POST" action="{{ route('admin.lowongan.store') }}" class="p-6 space-y-6">
            @csrf

            <!-- Informasi Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="posisi" class="block text-sm font-medium text-gray-700 mb-2">Judul / Posisi *</label>
                    <input type="text" id="posisi" name="posisi" value="{{ old('posisi') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                    @error('posisi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700 mb-2">Nama Perusahaan *</label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                    @error('nama_perusahaan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">Lokasi *</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi Pekerjaan -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Pekerjaan *</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none resize-none" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kualifikasi -->
            <div>
                <label for="kualifikasi" class="block text-sm font-medium text-gray-700 mb-2">Kualifikasi</label>
                <textarea id="kualifikasi" name="kualifikasi" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none resize-none">{{ old('kualifikasi') }}</textarea>
                @error('kualifikasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Kadaluarsa -->
            <div>
                <label for="tanggal_kadaluarsa" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kadaluarsa *</label>
                <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                @error('tanggal_kadaluarsa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kontak -->
            <div>
                <label for="kontak" class="block text-sm font-medium text-gray-700 mb-2">Kontak *</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                @error('kontak')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.lowongan.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    Simpan Lowongan
                </button>
            </div>
        </form>
    </div>
@endsection
