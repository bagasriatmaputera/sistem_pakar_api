<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\AturanResource as ResourcesAturanResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AturanResource;
use App\Models\Aturan;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    public function index(){
        $aturan = Aturan::with(['gejala','lvl_adiksi'])->get();
        return AturanResource::collection($aturan);
    }
}
