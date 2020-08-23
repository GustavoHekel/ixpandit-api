<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PokemonTest extends TestCase
{

    public function testFetchIndex()
    {
        $response = $this->get('http://127.0.0.1:8000/api/v1/pokemon?name=bul');

        $response->assertStatus(200);
    }

    public function testFetchPokemon()
    {
        $response = $this->get('http://127.0.0.1:8000/api/v1/pokemon?name=pikachu');

        $response->assertStatus(200);
    }

    public function testFetchIndexFails()
    {
        $response = $this->get('http://127.0.0.1:8000/api/v1/pokemon');

        $response->assertStatus(302);
    }
}
