<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        Category::factory(40)->create();
        $tags = Tag::factory(100)->create();
        $posts = Post::factory(300)->create();
        foreach ($posts as $post) {
            $tagsIds = $tags->random(7)->pluck('id');
            $post->tags()->attach($tagsIds);
        }
        // \App\Models\User::factory(10)->create();
    }
}
