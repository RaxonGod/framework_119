<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function create()
    {
    $prodi = Prodi::all();
    return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'nim' => 'required|string|size:7|unique:mahasiswa,nim',
        'nama' => 'required|string|min:3|max:100',
        'id_prodi' => 'required|exists:prodi,id_prodi',
    ], [
        'nim.required' => 'NIM wajib diisi.',
        'nim.unique' => 'NIM sudah terdaftar.',
        'nama.min' => 'Nama minimal 3 karakter.',
    ]);

    Mahasiswa::create($validated);

    return redirect('/mahasiswa')
        ->with('success', 'Data tersimpan');
    }

    public function index()
    {
        $data = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data'));
    }

    public function show($id)
    {
        $m = Mahasiswa::with('mataKuliah')->findOrFail($id);
        return view('mahasiswa.show', compact('m'));
    }
}
