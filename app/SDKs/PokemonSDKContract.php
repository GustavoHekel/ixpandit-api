<?php

namespace App\SDKs;

interface PokemonSDKContract
{
    public static function getBaseURI();

    public static function index($queryString = []);

    public static function show($id);
}
