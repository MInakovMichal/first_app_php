<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Post\BaseController;



class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
