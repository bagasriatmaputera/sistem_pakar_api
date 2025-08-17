<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';
    protected $fillable = [
        'pengguna_id',
        'gejala_id',
        'adiksi_id',
        'cf_user',
        'cf_kombinasi',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
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
