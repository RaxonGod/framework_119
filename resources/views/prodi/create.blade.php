<form action="{{ route('prodi.store') }}" method="POST">
    @csrf
    @include('prodi._form')
    <button type="submit">Simpan</button>
</form>
