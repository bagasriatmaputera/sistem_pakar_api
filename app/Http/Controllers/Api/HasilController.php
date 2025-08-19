<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\HasilResource as ResourcesHasilResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HasilResource;
use App\Models\Hasil;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $jawaban = Hasil::with(['pengguna', 'gejala', 'adiksi'])->get();
        return HasilResource::collection($jawaban);
    }

    public function show(Pengguna $pengguna)
    {
        $pengguna->load('hasil.pengguna','hasil.gejala', 'hasil.adiksi'); // load relasi yg dibutuhkan
        return HasilResource::collection($pengguna->hasil);
    }
}
