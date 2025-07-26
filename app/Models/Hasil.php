<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = [
        'pengguna_id',
        'lvl_adiksi_id',
        'cf_akhir'
    ];

    public function lvl_adiksi(){
        return $this->hasOne(Lvl_adiksi::class);
    }
    public function pengguna(){
        return $this->hasOne(Pengguna::class);
    }
}
