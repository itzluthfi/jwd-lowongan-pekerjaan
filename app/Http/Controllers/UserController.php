<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profil()
    {
        return view('profil', ['user' => Auth::user()]);
    }

    public function home()
    {
        $lowongans = Lowongan::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('lowongans'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function informasiUmum()
    {
        $totalLowongan = Lowongan::where('tanggal_kadaluarsa', '>=', now())->count();
        $totalUser = User::count();
        return view('informasi-umum', compact('totalLowongan', 'totalUser'));
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui');
    }
}
