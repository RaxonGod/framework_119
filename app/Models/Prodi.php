<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = ['kode_prodi', 'nama_prodi'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
    }
}
