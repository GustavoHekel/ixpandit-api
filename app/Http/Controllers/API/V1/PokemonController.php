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
                'limit' => 807
                /*
                 * I'm fetching the first 807 pokemon (of a total of 1048 available on the API)
                 * I've taken this approach as there's no way to make a partial search by name on the
                 * pokemon API, so I get the full list, save it in cache and then filter by name, then from that
                 * smaller set I fetch the details of each one (and again store that result in cache)
                 */
            ]
        );

        $pokemon = Pokemon::all($queryString);

        return PokemonResource::collection($pokemon);
    }
}
