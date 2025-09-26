@extends('layouts.app')
@section('content')

<div class="container mt-5 mb-5">
    </nav>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Departemen</th>
        </tr>
        @foreach($Pegawai as $pegawai)
        <tr>
                <td> {{$pegawai->id}}</td>
                <td> {{$pegawai->nama}}</td>
                <td> {{$pegawai->alamat}}</td>
                <td> {{$pegawai->nomortelepon}}</td>
                <td> {{$pegawai->email}}</td>
                <td> {{$pegawai->jabatan}}</td>
                <td> {{$pegawai->departemen}}</td>
                <td>
                    <form action="{{ route('pegawai.restore', $pegawai->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm"
                        onclick="return confirm('Yakin ingin mengembalikan data ini?')">
                        Restore
                    </button>
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
    <a href="/datapegawai" class="btn btn-primary">Kembali</a>
</div>
@endsection