@extends('layouts.dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-primary to-blue-600 px-6 py-8">
            <div class="flex items-center space-x-6">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-white">
                    <h1 class="text-2xl font-bold">{{ Auth::user()->name }}</h1>
                    <p class="text-blue-100">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- About Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Tentang Saya</h2>
                        <p class="text-gray-700 leading-relaxed">
                            Saya adalah seorang profesional yang berpengalaman dan passionate dalam bidang teknologi.
                            Selalu berusaha memberikan yang terbaik dalam setiap pekerjaan dan terus belajar hal-hal baru.
                        </p>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Informasi Kontak</h2>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span class="text-gray-700">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                                <span class="text-gray-700">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-3">
                        <button type="button" onclick="document.getElementById('editProfilModal').classList.remove('hidden')" class="block w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-center">
                            Edit Profil
                        </button>
                        <!-- Modal Edit Profil -->
                        <div id="editProfilModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                                <button type="button" onclick="document.getElementById('editProfilModal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <h2 class="text-xl font-bold mb-4 text-gray-900">Edit Profil</h2>
                                <form method="POST" action="{{ route('profil.update') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti password</p>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                                        <span id="passwordError" class="text-xs text-red-500 mt-1 hidden">Konfirmasi password tidak sama!</span>
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="document.getElementById('editProfilModal').classList.add('hidden')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</button>
                                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-blue-700">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.querySelector('#editProfilModal form').addEventListener('submit', function(e) {
                                        var password = document.getElementById('password').value;
                                        var confirm = document.getElementById('password_confirmation').value;
                                        var error = document.getElementById('passwordError');
                                        if (password !== '' && password !== confirm) {
                                            error.classList.remove('hidden');
                                            e.preventDefault();
                                        } else {
                                            error.classList.add('hidden');
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        @if (Auth::user() && Auth::user()->role === 'user')
                            <a href="{{ route('lowongan.index') }}" class="block w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors duration-200 text-center">
                                Cari Lowongan
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
