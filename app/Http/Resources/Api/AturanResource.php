<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AturanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'gejala' => new GejalaResource($this->whenLoaded('gejala')),
            'adiksi' => new AdiksiResource($this->whenLoaded('lvl_adiksi')),
            'cf_pakar' => $this->cf_pakar
        ];
    }
}
