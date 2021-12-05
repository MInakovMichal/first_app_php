<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $StoreRequest)
    {
        $somePost = $StoreRequest->validated();

        $this->service->store($somePost);

        return redirect()->route('post.index');
    }
}
