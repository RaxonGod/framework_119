<h1>Daftar Program Studi</h1>
@if (session('success')) <p>{{ session('success') }}</p> @endif

@if (session('user_role') === 1)
    <a href="{{ route('prodi.create') }}">Tambah Prodi</a>
@endif

<table border="1">
    <tr><th>Kode</th><th>Nama Prodi</th><th>Aksi</th></tr>
    @forelse ($data as $p)
<tr>
    <td>{{ $p->kode_prodi }}</td>
    <td>{{ $p->nama_prodi }}</td>
    <td>
        @if (session('user_role') == 1)
        <a href="{{ route('prodi.edit', $p->id_prodi) }}">Ubah</a>
        <form method="POST" style="display:inline" action="{{ route('prodi.destroy', $p->id_prodi) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
        @endif
    </td>
</tr>
@empty
<tr><td colspan="3">Belum ada data.</td></tr>
@endforelse
</table>
