<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lowongan;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $lowongans = Lowongan::orderBy('created_at', 'desc')->paginate(3);
        $users = User::paginate(3);
        return view('admin.dashboard', compact('user', 'lowongans', 'users'));
    }

    public function lowonganIndex()
    {
        $query = Lowongan::query();

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('posisi', 'like', "%$search%")
                    ->orWhere('nama_perusahaan', 'like', "%$search%")
                    ->orWhere('lokasi', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%")
                    ->orWhere('kualifikasi', 'like', "%$search%");
            });
        }

        $lowongans = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function lowonganCreate()
    {
        return view('admin.lowongan.create');
    }

    public function lowonganStore(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kualifikasi' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'kontak' => 'required',
        ]);
        Lowongan::create($validated);
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function lowonganEdit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    public function lowonganUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'kualifikasi' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'kontak' => 'required',
        ]);
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update($validated);
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diupdate');
    }

    public function lowonganDestroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }

    // USER CRUD 
    public function userIndex()
    {
        $query = User::query();

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        if (request('role')) {
            $query->where('role', request('role'));
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => ['nullable', 'confirmed'],
        ]);
        $user = User::findOrFail($id);
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];
        if (!empty($validated['password'])) {
            $updateData['password'] = bcrypt($validated['password']);
        }
        $user->update($updateData);
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }
}
