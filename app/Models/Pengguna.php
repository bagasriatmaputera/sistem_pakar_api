<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas';
    protected $fillable = [
        'nama',
        'umur',
        'prodi'
    ];

    public function hasil(){
        return $this->belongsTo(Hasil::class);
    }
}
