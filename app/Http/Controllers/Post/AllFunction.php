<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
    public function store()
    {
        $somePost = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $somePost['tags'];
        unset($somePost['tags']);
        $post = Post::create($somePost);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {

        return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(Post $post)
    {
        $somePost = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $somePost['tags'];
        unset($somePost['tags']);

        $post->update($somePost);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
