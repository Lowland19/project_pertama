@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Tambah Data</h1>
    <form action="/simpandata">
        <div class="mb-1">
            <label class="form-label" for="nama">Nama</label><br>
            <input class="form-control" type="text" name="nama" id="nama"><br>
        </div>
        <div class="mb-1">
            <label class="form-label">Alamat</label><br>
            <input class="form-control" type="text" name="alamat"><br>
        </div>
        <div class="mb-1">
            <label class="form-label">Nomor Telepon</label><br>
            <input class="form-control" type="text" name="nomortelepon"><br>
        </div>
        <div class="mb-1">
            <label class="form-label">Email</label><br>
            <input class="form-control" type="text" name="email"><br>
        </div>
        <div class="mb-1">
            <label class="form-label">Jabatan</label><br>
            <input class="form-control" type="text" name="jabatan"><br>
        </div>
        <div>
            <label class="form-label">Departemen</label><br>
            <input class="form-control" type="text" name="departemen"><br>
        </div>
        <div class="mb-3">
        <label for="foto" class="form-label">Foto Profil</label>
        <input type="file" name="foto" id="foto" class="form-control">
    </div>
        <input class="btn btn-primary" type="submit" value="simpan">
</form>
</div>
@endsection