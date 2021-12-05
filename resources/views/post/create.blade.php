@extends('layouts.main')

@section('content')
<div>
    <form method="POST" action="{{ route('post.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                <option <?php
                        if (old('category_id') == $category->id) {
                            echo " selected";
                        } else {
                            echo "";
                        }
                        ?> value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags">Tag</label>
            <select class="form-select" multiple id="tags" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-primary">Clear</button>
        <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection