@extends('layouts.main')

@section('content')
<div>
    <form method="POST" action="{{ route('post.update', $post->id) }}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" id="category" name="category_id">
                <!-- @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach -->
                <?php
                foreach ($categories as $category)
                    if ($category->id === $post->category_id) {
                        echo "<option selected value=\"$category->id\">$category->title</option>";
                    } else {
                        echo "<option value=\"$category->id\">$category->title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tags">Tag</label>
            <select class="form-select" multiple id="tags" name="tags[]">
                @foreach($tags as $tag)
                <option <?php
                        foreach ($post->tags as $postTag) {
                            if ($tag->id === $postTag->id) {
                                echo " selected";
                            } else {
                                echo "";
                            }
                        }
                        ?> value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <button type="reset" class="btn btn-primary">Clear</button>
        <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection