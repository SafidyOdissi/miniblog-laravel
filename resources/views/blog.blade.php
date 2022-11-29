@extends('layouts.app') @section('content')
    <!-- Post preview-->
    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="{{ URL::route('route.single', ['id' => $post->id]) }}">
                <h2 class="post-title">{{ $post->title }}</h2>
            </a>
            <p class="post-meta">on {{ date('F j, Y, g:i a', strtotime($post->created_at)) }}</p>
            <div class="d-flex align-items-center">
                <a class="btn btn-danger" href="{{ URL::route('blog.delete', ['id' => $post->id]) }}">Delete</a>
                <a class="btn btn-primary" href="{{ URL::route('blog.edit', ['id' => $post->id]) }}">Edit</a>
            </div>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
    @endforeach
    <!-- Pager-->
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
    </div>
@endsection
