<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>{{ $m->nama }}</h1>
    <h3>Daftar Mata Kuliah (KRS):</h3>
    <ul>
        @foreach($m->mataKuliah as $mk)
        <li>{{ $mk->nama_mk }} ({{ $mk->sks }} SKS)</li>
        @endforeach
    </ul>
    <br>
    <a href="/mahasiswa">&laquo; Kembali ke Daftar Mahasiswa</a>
</body>
</html>
