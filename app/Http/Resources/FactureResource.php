<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactureResource extends JsonResource
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
            'compteur_id' => $this->compteur_id,
            'montant' => $this->montant,
            'date' => $this->date,
            'facture' => $this->facture,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
