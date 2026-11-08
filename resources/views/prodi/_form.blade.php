<label>Kode Prodi</label>
<input type="text" name="kode_prodi" value="{{ old('kode_prodi', $prodi->kode_prodi ?? '') }}">
@error('kode_prodi') <small>{{ $message }}</small> @enderror

<label>Nama Prodi</label>
<input type="text" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi ?? '') }}">
@error('nama_prodi') <small>{{ $message }}</small> @enderror
