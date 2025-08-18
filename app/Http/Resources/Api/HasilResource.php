<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class HasilResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_hasil' => $this->id,
            'pengguna' => $this->whenLoaded('pengguna', function () {
                return [
                    'id' => $this->pengguna->id,
                    'nama' => $this->pengguna->nama,
                ];
            }),
            // relasi
            'adiksi' => $this->whenLoaded('adiksi', function () {
                return [
                    'id' => $this->adiksi->id,
                    'nama' => $this->adiksi->nama,
                    'deskripsi' => $this->adiksi->deskripsi,
                    'solusi' => $this->adiksi->solusi,
                ];
            }),
            'cf_final' => $this->cf_final,
            'tanggal:' => $this->tgl_diagnosa
        ];
    }
}
