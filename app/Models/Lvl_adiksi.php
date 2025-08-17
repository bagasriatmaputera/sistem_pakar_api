<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lvl_adiksi extends Model
{
    protected $table = 'lvl_adiksis';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'solusi'
    ];

    public function aturan(){
        return $this->hasOne(Aturan::class);
    }

    public function hasil(){
        $this->hasMany(Hasil::class);
    }
}
