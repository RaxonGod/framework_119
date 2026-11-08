<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
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
