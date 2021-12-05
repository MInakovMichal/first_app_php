@extends('layouts.main')

@section('content')
<div>
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add post</a>
    </div>
    <ol class="list-group list-group-numbered">
        @foreach($posts as $post)
        <a href="{{ route('post.show', $post->id) }}"><li>{{ $post->title }}</li></a>
        @endforeach
<div>
    {{ $posts->links() }}
</div>
    </ol>
</div>
@endsection
