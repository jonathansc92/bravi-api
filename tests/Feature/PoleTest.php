<?php

namespace Tests\Feature;

use App\Models\Pole;
use Tests\TestCase;

class PoleTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/pole');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = [
            'name' => 'Exemplo',
        ];

        $response = $this->post('/api/pole', $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $pole = Pole::factory()->create();
        $response = $this->get('/api/pole/'.$pole->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $pole = Pole::factory()->create();

        $data = [
            'name' => 'Exemplo',
        ];
        $response = $this->put('/api/pole/'.$pole->id, $data);
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $pole = Pole::factory()->create();

        $response = $this->delete('/api/pole/'.$pole->id);
        $response->assertStatus(200);
    }
}
