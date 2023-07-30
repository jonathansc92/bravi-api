<?php

namespace Tests\Feature;

use App\Models\ExternalProcedure;
use Tests\TestCase;

class ExternalProcedureTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/externalprocedure');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $response = $this->post('/api/externalprocedure', ExternalProcedure::factory()->make()->toArray());

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $externalProcedure = ExternalProcedure::factory()->create();
        $response = $this->get('/api/externalprocedure/'.$externalProcedure->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $externalProcedure = ExternalProcedure::factory()->create();

        $data = [
            'name' => 'Exemplo',
        ];
        $response = $this->put('/api/externalprocedure/'.$externalProcedure->id, $data);
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $externalProcedure = ExternalProcedure::factory()->create();

        $response = $this->delete('/api/externalprocedure/'.$externalProcedure->id);
        $response->assertStatus(200);
    }
}
