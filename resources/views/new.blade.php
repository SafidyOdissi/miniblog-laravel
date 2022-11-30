@extends('layouts.app')
@section('content')
    @php
        $url = URL::route('blog.store');
        $method = 'POST';
        if (isset($post)) {
            $url = URL::route('blog.update', ['id' => $post->id]);
            $method = 'PUT';
        }
    @endphp
    <form action="{{ $url }}" method="POST">
        @method($method)
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" value="{{ $post->title ?? '' }}" class="form-control" id="title"
                aria-describedby="emailHelp" placeholder="Titre de votre Article" />
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sous titre</label>
            <input type="text" name="sub_title" value="{{ $post->sub_title ?? '' }}" class="form-control"
                id="exampleInputPassword1" placeholder="Votre sous titre" />
            @error('sub_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="content-post">Contenues de votre Article</label>
            <textarea class="form-control" name="content" id="content-post" placeholder="Contenues de votre Article">{{ $post->content ?? '' }}</textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        @if (isset($categories))
            <div class="form-group">
                <label for="content-post">Category</label>
                <select name="categorie" id="select_category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if (isset($post->created_at))
            <div class="form-group">
                <label for="content-post">Contenues de votre Article</label>
                <input type="date" name="created_at" value="{{ date('Y-m-d', strtotime($post->created_at)) }}"
                    class="form-control" id="exampleInputPassword1" placeholder="Votre sous titre" />
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
