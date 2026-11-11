<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mahasiswa;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; //
    }

    public function rules(): array
    {
        return [
            'nim' => 'required|string|size:' . Mahasiswa::PANJANG_NIM . '|unique:mahasiswa,nim', //
            'nama' => 'required|string|min:3|max:100', //
            'id_prodi' => 'required|exists:prodi,id_prodi', //
            'email' => 'nullable|email|unique:mahasiswa,email',
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM wajib diisi.', //
            'nama.min' => 'Nama minimal 3 karakter.', //
        ];
    }
}
