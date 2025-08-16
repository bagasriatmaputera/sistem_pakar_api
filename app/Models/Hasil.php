<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasils';

    protected $fillable = [
        'pengguna_id',
        'cf_loss_of_control',
        'cf_craving',
        'cf_tolerance',
        'cf_withdrawal',
        'cf_preoccupation_salience',
        'cf_continued_use_despite_harm',
        'cf_functional_impairment',
    ];

    public function pengguna(){
        $this->hasOne(Pengguna::class);
    }

}
