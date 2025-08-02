<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AdiksiResource;
use App\Models\Lvl_adiksi;
use Illuminate\Http\Request;

class AdiksiController extends Controller
{
    public function index(){
        $adiksi = Lvl_adiksi::all();
        return AdiksiResource::collection($adiksi);
    }
}
