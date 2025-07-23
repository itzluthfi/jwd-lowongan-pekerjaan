<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;


class LowonganController extends Controller
{
    public function index()
    {
        $query = Lowongan::query();
        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('posisi', 'like', "%$search%")
                    ->orWhere('nama_perusahaan', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%")
                    ->orWhere('kualifikasi', 'like', "%$search%")
                    ->orWhere('lokasi', 'like', "%$search%");
            });
        }
        if (request('status')) {
            if (request('status') == 'aktif') {
                $query->where('tanggal_kadaluarsa', '>=', now());
            } elseif (request('status') == 'kadaluarsa') {
                $query->where('tanggal_kadaluarsa', '<', now());
            }
        }
        $lowongans = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('lowongan', compact('lowongans'));
    }

    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('lowongan-show', compact('lowongan'));
    }
}
