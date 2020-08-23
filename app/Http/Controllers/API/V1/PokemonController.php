<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\IndexPokemonRequest;
use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(IndexPokemonRequest $request)
    {
        $queryString = array_merge(
            $request->all(),
            [
                'limit' => 890
            ]
        );

        $pokemon = Pokemon::all($queryString);

        return PokemonResource::collection($pokemon);
    }
}
