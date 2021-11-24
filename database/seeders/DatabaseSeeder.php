<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 users, 40 posts and 200 comments
        User::factory()->count(10)->has(
            Post::factory()->count(4)->has(
                Comment::factory()->count(5)
            )
        )->create();

        // Create 2 users, 20 posts and 60 comments
        User::factory()->count(2)->has(
            Post::factory()->count(10)->has(
                Comment::factory()->count(3)
            )
        )->create();
    }
}
