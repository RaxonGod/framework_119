<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'id_prodi' => 'required|string|max:10|unique:prodi,id_prodi',
        'nama_prodi' => 'required|string|max:100',
    ]);

    Prodi::create($validated);
    return redirect()->route('prodi.index')->with('success', 'Program studi berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $prodi = Prodi::findOrFail($id);
    $validated = $request->validate([
        'id_prodi' => 'required|string|max:10|unique:prodi,id_prodi',
        'nama_prodi' => 'required|string|max:100',
    ]);

    $prodi->update($validated);
    return redirect()->route('prodi.index')->with('success', 'Program studi berhasil diperbarui.');
}

    public function index()
    {
        $data = Prodi::orderBy('id_prodi')->get();
        return view('prodi.index', compact('data'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Program studi berhasil dihapus.');
    }
}
