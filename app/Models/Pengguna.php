<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $fillable = [
        'nama',
        'umur',
        'jenis_kelamin',
        'prodi'
    ];

    public function hasil(){
        return $this->hasMany(Hasil::class,'pengguna_id');
    }
    public function jawaban(){
        return $this->hasMany(Jawaban::class);
    }
}
