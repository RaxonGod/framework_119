<h1>Form Mahasiswa - {{ $namaSistem }}</h1>
<form method="POST" action="/mahasiswa">
    @csrf

    <div style="margin-bottom: 10px;">
        <label>NIM:</label><br>
        <input name="nim" value="{{ old('nim') }}">
        @error('nim') <small style="color: red;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 10px;">
        <label>Nama:</label><br>
        <input name="nama" value="{{ old('nama') }}">
        @error('nama') <small style="color: red;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 10px;">
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <small style="color: red;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-bottom: 10px;">
        <label>Prodi:</label><br>
        <select name="id_prodi">
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodi as $p)
                <option value="{{ $p->id_prodi }}" {{ old('id_prodi') == $p->id_prodi ? 'selected' : '' }}>
                    {{ $p->nama_prodi }}
                </option>
            @endforeach
        </select>
        @error('id_prodi') <small style="color: red;">{{ $message }}</small> @enderror
    </div>

    <button type="submit">Simpan</button>
</form>

@if ($errors->any())
    @foreach ($errors->all() as $e)
        <p style="color:red;">{{ $e }}</p>
    @endforeach
@endif
