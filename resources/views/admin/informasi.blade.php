@extends('layouts.dashboard')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-primary mb-2">Informasi Umum</h2>
        <a href="{{ route('admin.informasi.create') }}" class="mb-4 inline-block px-4 py-2 bg-primary text-white rounded hover:bg-blue-700">Tambah Informasi</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Judul</th>
                        <th class="px-4 py-2 border-b">Deskripsi</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informasis as $informasi)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $informasi->judul }}</td>
                            <td class="px-4 py-2 border-b">{{ $informasi->deskripsi }}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="text-primary hover:underline mr-2">Edit</a>
                                <form action="{{ route('admin.informasi.destroy', $informasi->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus informasi?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">Belum ada informasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
