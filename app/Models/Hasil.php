<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = [
        'pengguna_id',
        'adiksi_id',
        'cf_final',
        'tgl_diagnosa'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function adiksi()
    {
        return $this->belongsTo(Lvl_adiksi::class);
    }
    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
