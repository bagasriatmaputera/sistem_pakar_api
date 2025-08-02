<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PenggunaResource;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = Pengguna::all();
        return PenggunaResource::collection($pengguna);
    }
}
