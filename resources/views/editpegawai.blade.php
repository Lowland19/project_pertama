@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">
    @if($Pegawai->foto)
    <img src="{{ asset('storage/'.$Pegawai->foto) }}" alt="Foto Pegawai" width="120" class="img-thumbnail">
@else
    <img src="{{ asset('images/default.png') }}" alt="Default" width="120" class="img-thumbnail">
@endif
    <form action="{{ route('pegawai.update', $Pegawai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $Pegawai->nama }}">
    </div>
    <div class="mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $Pegawai->alamat }}">
    </div>
    <div class="mb-3">
            <label class="form-label" for="nomortelepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomortelepon" name="nomortelepon" value="{{ $Pegawai->nomortelepon }}">
    </div>
    <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $Pegawai->email }}">
    </div>
    <div class="mb-3">
            <label class="form-label" for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $Pegawai->jabatan }}">
    </div>
    <div class="mb-3">
            <label class="form-label" for="departemen">Departemen</label>
            <input type="text" class="form-control" id="departemen" name="departemen" value="{{ $Pegawai->departemen }}">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto Profil</label>
        <input type="file" name="foto" id="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

</div>

@endsection