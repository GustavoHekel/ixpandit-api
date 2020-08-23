<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'    => $this['name'],
            'details' => [
                'base_experience' => $this['details']['base_experience'] ?? null,
                'height'          => $this['details']['height'] ?? null,
                'id'           => $this['details']['id'],
                'img'             => $this['details']['sprites']['front_default'],
                'types'           => $this['details']['types'],
                'weight'          => $this['details']['weight'],
            ]
        ];
    }
}
