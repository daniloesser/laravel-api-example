<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChecklistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testChecklistApiJson()
    {
        $this->json('get', '/api/checklist', [])
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'eventId',
                        'date',
                        'customer' => [
                            'data' => [
                                'id',
                                'name'
                            ]
                        ]
                    ]
                ],
            ]);
    }

}
