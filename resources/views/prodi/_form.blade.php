<label>Kode Prodi</label>
<input type="text" name="id_prodi" value="{{ old('id_prodi', $prodi->kode_prodi ?? '') }}">
@error('kode_prodi') <small>{{ $message }}</small> @enderror

<label>Nama Prodi</label>
<input type="text" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi ?? '') }}">
@error('nama_prodi') <small>{{ $message }}</small> @enderror
