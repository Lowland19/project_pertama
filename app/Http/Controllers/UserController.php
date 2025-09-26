<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function lihat(){
        $user = Auth::user();
        return view('profilpengguna',compact('user'));
    }

    public function ubah(Request $request){
        $user = User::find(Auth::id());

        $request->validate([
            'alamat'        => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
            'password'      => 'nullable|min:6|confirmed',
        ]);

        $user->alamat        = $request->alamat;
        $user->nomortelepon = $request->nomortelepon;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profilpengguna')->with('success', 'Profil berhasil diperbarui!');
        dd($request->all());
    }
}
