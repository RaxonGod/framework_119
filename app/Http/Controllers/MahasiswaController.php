<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Http\Requests\StoreMahasiswaRequest;

class MahasiswaController extends Controller
{
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(StoreMahasiswaRequest $request)
    {
        Mahasiswa::create($request->validated());
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
