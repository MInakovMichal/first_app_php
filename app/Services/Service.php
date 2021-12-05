<?php

namespace app\Services;

use App\Models\Post;

class Service
{
    public function store($somePost)
    {
        $tags = $somePost['tags'];
        unset($somePost['tags']);

        $post = Post::create($somePost);
        $post->tags()->attach($tags);
    }
    public function update($post, $somePost)
    {
        $tags = $somePost['tags'];
        unset($somePost['tags']);

        $post->update($somePost);
        $post->tags()->sync($tags);
    }
}
