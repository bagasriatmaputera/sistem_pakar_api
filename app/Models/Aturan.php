<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $table = 'aturans';
    protected $fillable = ['gejala_id','lvl_adiksi_id','cf_pakar'];

    public function gejala(){
        return $this->belongsTo(Gejala::class)->orderBy('id');;
    }
    public function lvl_adiksi(){
        return $this->belongsTo(Lvl_adiksi::class)->orderBy('id');;
    }
}
