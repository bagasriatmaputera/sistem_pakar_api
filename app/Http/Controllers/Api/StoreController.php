<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormValidasi;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store_pengguna(FormValidasi $request)
{
    $data = $request->validated();

    // Simpan pengguna
    $pengguna = Pengguna::create($data['pengguna']);

    // Simpan jawaban
    foreach ($data['answers'] as $ans) {
        Jawaban::create([
            'pengguna_id'   => $pengguna->id,
            'gejala_id'     => $ans['gejala_id'],
            'adiksi_id'     => $ans['adiksi_id'],
            'cf_user'       => $ans['cf_user'],
            'cf_pakar'      => $ans['cf_pakar'],
            'cf_kombinasi'  => $ans['cf_kombinasi'],
        ]);
    }

    // 7 group, tiap group isi 3 gejala
    $groups = array_chunk($data['answers'], 3);

    foreach ($groups as $group) {
        $cf0 = $group[0]['cf_kombinasi'];
        $cf1 = $group[1]['cf_kombinasi'];
        $cf2 = $group[2]['cf_kombinasi'];

        $cf_gabungan = $cf0 + $cf1 - ($cf0 * $cf1);
        $cf_final = ($cf2 + $cf_gabungan - ($cf2 * $cf_gabungan)) * 100;

        Hasil::create([
            'pengguna_id'  => $pengguna->id,
            'adiksi_id'    => $group[0]['adiksi_id'],
            'cf_final'     => round($cf_final, 2),
            'tgl_diagnosa' => now(),
        ]);
    }

    return response()->json([
        'message'  => 'Data berhasil disimpan',
        'pengguna' => $pengguna,
        'data'     => $data
    ]);
}

}
