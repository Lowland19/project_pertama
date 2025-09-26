@extends('layouts.app')

@section('content')
 <div class="container mt-5 mb-5">
    <form action="{{ route('pengguna.ubah, $user->id') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" disabled value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" disabled value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomortelepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomortelepon" name="nomortelepon" value="{{ $user->nomortelepon }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password (Opsional)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label" for="passwordconfirmation">Konfirmasi Password</label>
            <input type="password" class="form-control" id="passwordconfirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
 </div>
@endsection