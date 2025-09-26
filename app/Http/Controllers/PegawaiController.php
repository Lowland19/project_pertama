<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $user = Auth::user();
        $Pegawai = Pegawai::all();
        return view('pegawai.tabel',compact('Pegawai','user'));
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
        return redirect('datapegawai');
    }

    public function destroy($id){
        $Pegawai = Pegawai::findOrFail($id);
        $Pegawai->delete();
        return redirect('datapegawai');
    }

    public function trash(){
        $Pegawai = Pegawai::onlyTrashed()->get();
        return view('pegawai.tabelterhapus',compact('Pegawai'));
    }

    public function restore($id){
        $Pegawai = Pegawai::onlyTrashed()->where('id',$id)->first();
        if ($Pegawai) {
            $Pegawai->restore();
        }
        return redirect('/tempatsampah');
    }

    public function edit($id){
        $Pegawai = Pegawai::findOrFail($id);
        return view('editpegawai', compact('Pegawai'));
    }

    public function update(Request $request, $id){
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama'    => 'required|string|max:100',
            'jabatan' => 'required|string|max:50',
            'alamat'  => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'departemen'  => 'nullable|string|max:255',
            'email' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto')) {
        // hapus foto lama jika ada
        if ($pegawai->foto && file_exists(storage_path('app/public/'.$pegawai->foto))) {
            unlink(storage_path('app/public/'.$pegawai->foto));
        }

        // simpan file baru
        $path = $request->file('foto')->store('pegawai', 'public');
        $pegawai->foto = $path;
        }
        $pegawai->nama    = $request->nama;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->alamat  = $request->alamat;
        $pegawai->nomortelepon = $request->nomortelepon;
        $pegawai->departemen = $request->departemen;
        $pegawai->email = $request->email;
        $pegawai->save();

        return redirect('datapegawai');
    }
}