@extends('layouts.dashboard')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-2">Total Lowongan</h2>
            <div class="text-3xl font-bold text-primary">{{ $lowongans->count() }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-2">Total User</h2>
            <div class="text-3xl font-bold text-primary">{{ $users->count() }}</div>
        </div>
    </div>
    <h2 class="text-xl font-bold mb-4">Lowongan Terbaru</h2>
    <table class="w-full mb-8">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Perusahaan</th>
                <th class="p-2 text-left">Posisi</th>
                <th class="p-2 text-left">Lokasi</th>
                <th class="p-2 text-left">Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lowongans->take(5) as $lowongan)
                <tr>
                    <td class="p-2">{{ $lowongan->nama_perusahaan }}</td>
                    <td class="p-2">{{ $lowongan->posisi }}</td>
                    <td class="p-2">{{ $lowongan->lokasi }}</td>
                    <td class="p-2">{{ $lowongan->tanggal_kadaluarsa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="text-xl font-bold mb-4">User Terbaru</h2>
    <table class="w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Nama</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users->take(5) as $user)
                <tr>
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
