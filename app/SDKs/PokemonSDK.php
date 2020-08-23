<?php


namespace App\SDKs;


use Illuminate\Support\Facades\Http;

class PokemonSDK implements PokemonSDKContract
{

    public static function getBaseURI()
    {
        return config('pokemon.api.uri');
    }

    public static function index($queryString = [])
    {
        $response = Http::get(self::getBaseURI() . '/pokemon', $queryString);

        if (! $response->ok()) {
            throw new \Exception($response->body());
        }

        return $response->json();
    }

    public static function show($id)
    {
        $response = Http::get(self::getBaseURI() . "/pokemon/{$id}");

        if (! $response->ok()) {
            throw new \Exception($response->body());
        }

        return $response->json();
    }
}
