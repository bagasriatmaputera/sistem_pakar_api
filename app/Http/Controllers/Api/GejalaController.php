<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\GejalaResource;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index(){
        $gejala = Gejala::all();
        return GejalaResource::collection($gejala);
    }
}
