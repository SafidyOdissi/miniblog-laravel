@extends('layouts.app')
@section('content')
    <form action="{{ URL::route('blog.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
                placeholder="Titre de votre Article" />
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sous titre</label>
            <input type="text" name="sub_title" class="form-control" id="exampleInputPassword1"
                placeholder="Votre sous titre" />
            @error('sub_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="content-post">Contenues de votre Article</label>
            <textarea class="form-control" name="content" id="content-post" placeholder="Contenues de votre Article">

            </textarea>
            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
