<?php

namespace Tests\Feature;

use App\Models\ExternalProceduresType;
use Tests\TestCase;

class ExternalProceduresTypeTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/externalprocedurestype');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = [
            'name' => 'Exemplo',
        ];

        $response = $this->post('/api/externalprocedurestype', $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $externalProceduresType = ExternalProceduresType::factory()->create();
        $response = $this->get('/api/externalprocedurestype/'.$externalProceduresType->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $externalProceduresType = ExternalProceduresType::factory()->create();

        $response = $this->put('/api/externalprocedurestype/'.$externalProceduresType->id, ExternalProceduresType::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $externalProceduresType = ExternalProceduresType::factory()->create();

        $response = $this->delete('/api/externalprocedurestype/'.$externalProceduresType->id);
        $response->assertStatus(200);
    }
}
