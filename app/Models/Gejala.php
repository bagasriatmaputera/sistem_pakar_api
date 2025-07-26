<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejalas';
    protected $fillable = ['kode','nama'];

    public function aturan(){
        return $this->hasOne(Aturan::class);
    }
}
