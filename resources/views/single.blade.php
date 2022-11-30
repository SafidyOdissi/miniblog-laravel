@extends('layouts.app')
@section('content')
    <span class="btn btn-primary">{{ $post->category->name }}</span>
    <h1>{{ $post->title }}</h1>
    <h4>{{ $post->sub_title }}</h4>
    <p>{{ $post->content }}</p>
    <hr>
    @foreach ($post->comments as $comment)
        <div>
            <b>{{ $comment->author }}</b>
            <p>
                {{ $comment->content }}
            </p>
        </div>
    @endforeach
@endsection
