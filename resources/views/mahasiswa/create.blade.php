<form method="POST" action="/mahasiswa">
    @csrf
    <input name="nim" value="{{ old('nim') }}">
    @error('nim') <small>{{ $message }}</small> @enderror

    <input name="nama" value="{{ old('nama') }}">
    @error('nama') <small>{{ $message }}</small> @enderror

    <select name="id_prodi">
        @foreach($prodi as $p)
        <option value="{{ $p->id_prodi }}">
            {{ $p->nama_prodi }}
        </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>
