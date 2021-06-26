<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    
    /**
     *
     * @test
     */
    public function store_post()
    {

        $user = create('App\Models\User');

        $data = [
            'title'=> $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 40),
            'author_id'=>$user->id
        ];
        
        // echo $data;
        $response = $this->json('POST', $this->baseUrl."posts", $data);

        $response->assertStatus(201); # la respuesta del servidor debe ser 201
        $this->assertDatabaseHas('posts', $data); #verifica que en la base de datos exista un post con la misma informacion que tenermos en data
        
        $post = Post::all()->first();

        $response->assertJson([
            'data'=>[
                'id'=>$post->id,
                'title'=>$post->title
            ]
        ]);
        
    }
}
