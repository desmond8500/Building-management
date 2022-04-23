<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class compteurResource extends JsonResource
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
            'appartement_id' => $this->appartement_id,
            'type' => $this->type,
            'reference' => $this->reference,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
