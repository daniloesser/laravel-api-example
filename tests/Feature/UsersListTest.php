<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testUsersApi()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    public function testUsersListJson()
    {
        $this->json('get', '/api/users', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                'Users' => [
                    [
                        'id',
                        'name',
                        'email'
                    ]
                ],
            ]);
    }

}
