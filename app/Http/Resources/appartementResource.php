<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class appartementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'numero' => $this->numero,
            'niveau' => $this->niveau,
            'adresse' => $this->adresse,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
