
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 mb-5">
    <h1 class="text-center">Data Pegawai</h1>
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
        </tr>
        @endforeach
    </table>
    <a href="/ubahdata" class="btn btn-primary">Tambah Data</a>
</div>
</body>