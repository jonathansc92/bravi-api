<?php

namespace Tests\Feature;

use App\Models\DocumentType;
use Tests\TestCase;

class DocumentTypeTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get('/api/documenttype');

        $response->assertStatus(200);
    }

    public function test_store(): void
    {
        $data = [
            'name' => 'Exemplo',
        ];

        $response = $this->post('/api/documenttype', $data);

        $response->assertStatus(201);
    }

    public function test_show(): void
    {
        $documentType = DocumentType::factory()->create();
        $response = $this->get('/api/documenttype/'.$documentType->id);
        $response->assertStatus(200);
    }

    public function test_update(): void
    {
        $documentType = DocumentType::factory()->create();

        $response = $this->put('/api/documenttype/'.$documentType->id, DocumentType::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy(): void
    {
        $documentType = DocumentType::factory()->create();

        $response = $this->delete('/api/documenttype/'.$documentType->id);
        $response->assertStatus(200);
    }
}
