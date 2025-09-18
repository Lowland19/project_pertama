<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{
    // public function index(): View{
    //     $Pegawai = DB::table('pegawai')->get();

    //     return view('pegawai.tabel', ['pegawai'=>$Pegawai]);
    // }

    public function tambah(){
        return view('pegawai.ubahdata');
    }

    // public function simpan(Request $request){
    //     DB::table('pegawai')->insert([
            // 'nama' => $request->nama,
            // 'alamat' => $request->alamat,
            // 'nomortelepon' => $request->nomortelepon,
            // 'email'=>$request->email,
            // 'jabatan'=>$request->jabatan,
            // 'departemen'=>$request->departemen
    //     ]);

    //     return redirect('/datapegawai');
    // }

    public function index(): View{
        $Pegawai = Pegawai::all();
        return view('pegawai.tabel',compact('Pegawai'));
}

    public function simpan(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255|unique:pegawai,nama',
            'email' => 'required|string|max:255|unique:pegawai,email',
            'nomortelepon' => 'required|string|max:15|unique:pegawai,nomortelepon'
        ]);
        Pegawai::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomortelepon' => $request->nomortelepon,
            'email'=>$request->email,
            'jabatan'=>$request->jabatan,
            'departemen'=>$request->departemen
        ]);
        return redirect('/datapegawai');
    }
}