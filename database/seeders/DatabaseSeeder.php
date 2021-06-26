<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();
        Post::factory()->times(5)->create();
        Comment::factory()->times(3)->create();
        // \App\Models\User::factory(10)->create();
    }
}
