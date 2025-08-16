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
}
