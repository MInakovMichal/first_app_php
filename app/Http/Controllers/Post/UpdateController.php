<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $updateRequest)
    {
        $somePost = $updateRequest->validated();

        $this->service->update($post, $somePost);

        return redirect()->route('post.show', $post->id);
    }
}
