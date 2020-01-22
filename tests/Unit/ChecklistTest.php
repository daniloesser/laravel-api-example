<?php

namespace Tests\Unit;

use App\Models\Checklist;
use Tests\TestCase;

class ChecklistTest extends TestCase
{
    public function test_can_list_posts()
    {
        $checklists = factory(Checklist::class, 2)->create()->map(function ($checklists) {
            return $checklists->only(['series_fk']);
        });
        $this->get('/api/checklist')
            ->assertStatus(200)
            ->assertJson(["data" => $checklists->toArray()])
            ->assertJsonStructure([
                '*' => ['series_fk'],
            ]);
    }
    /*
        public function test_can_create_post()
        {
            $data = [
                'title' => $this->faker->sentence,
                'content' => $this->faker->paragraph,
            ];
            $this->post(route('posts.store'), $data)
                ->assertStatus(201)
                ->assertJson($data);
        }


        public function test_can_show_post()
        {
            $post = factory(Post::class)->create();
            $this->get(route('posts.show', $post->id))
                ->assertStatus(200);
        }
    */

}
