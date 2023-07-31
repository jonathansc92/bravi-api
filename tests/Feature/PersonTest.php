<?php

namespace Tests\Feature;

use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    private $url = '/api/persons/';

    public function test_index(): void
    {
        $response = $this->get('/api/persons');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = [
            'name' => fake()->name(),
        ];

        $response = $this->post($this->url, $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $person = Person::factory()->create();
        $response = $this->get($this->url.$person->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $person = Person::factory()->create();

        $response = $this->put($this->url.$person->id, Person::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $person = Person::factory()->create();

        $response = $this->delete($this->url.$person->id);
        $response->assertStatus(200);
    }
}
