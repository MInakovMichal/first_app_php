@extends('layouts.main')

@section('content')
<div>
    <div>
        {{ $post->id }}. {{ $post->title }}
    </div>
    <div>
        Content: {{ $post->content }}
    </div>
    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <a href="{{ route('post.index') }}" class="btn btn-primary mt-3">Back</a>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mt-3">Edit</a>
            <input type="submit" value="Delete" class="btn btn-primary mt-3">
        </form>
    </div>
</div>
@endsection