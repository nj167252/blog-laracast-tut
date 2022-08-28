<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        $user_1 = User::factory()->create([
            'name' => 'John Wick'
        ]);

        $user_2 = User::factory()->create([
            'name' => 'Larry Slick'
        ]);

        Post::factory(10)->create([
            'user_id' => $user_1->id
        ]);

        Post::factory(10)->create([
            'user_id' => $user_2->id
        ]);
    }
}
