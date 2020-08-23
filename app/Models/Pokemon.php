<?php

namespace App\Models;

use App\SDKs\PokemonSDKContract;
use Illuminate\Support\Facades\Cache;

class Pokemon
{

    private static function connection()
    {
        return app()->make(PokemonSDKContract::class);
    }

    public static function all($queryString = [])
    {
        $pokemon = Cache::remember('Pokemon_all_', 600, function () use ($queryString) {
            return self::connection()->index($queryString);
        });

        return collect($pokemon['results'])
            ->filter(function ($p) use ($queryString) {
                return strpos($p['name'], $queryString['name']) !== false;
            })
            ->map(function ($p) {

                return self::show($p['name']);

            });

    }

    public static function show($id)
    {
        $pokemon = Cache::remember("Pokemon_show_{$id}", 600, function () use ($id) {
            return self::connection()->show($id);
        });

        return [
            'name'    => $pokemon['name'],
            'details' => $pokemon
        ];
    }

}
