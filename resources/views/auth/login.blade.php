@extends('layouts.app')
@section('content')
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Masuk ke Akun Anda</h2>
            <p class="mt-2 text-gray-600">Selamat datang kembali! Silakan masuk ke akun Anda</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-8">
            <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" placeholder="nama@email.com" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                    Masuk
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="/register" class="text-primary hover:text-blue-700 font-medium">Daftar di sini</a>
                </p>
            </div>

          
        </div>
    </div>
@endsection
