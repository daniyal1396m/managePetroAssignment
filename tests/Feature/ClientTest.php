<?php

    namespace Tests\Feature;

    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;

    class ClientTest extends TestCase
    {
        use RefreshDatabase;

        public function test_can_index_client()
        {
            $response = $this->get('/api/clients');
            $response->assertStatus(200);
        }

        public function test_can_create_client()
        {
            $clientData = [
                'name' => 'Daniel',
                'lastname' => 'Motahari Test ',
                'email' => 'danieltest@yahoo.com',
                'phone' => '09901398457',
            ];

            $response = $this->post('/api/clients', $clientData);

            $response->assertStatus(201);
            $this->assertDatabaseHas('clients', $clientData);
        }

    }
