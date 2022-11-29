<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{

    public function __construct()
    {
    }
    public function list()
    {
        $posts = Post::all()->toArray();
        return view('blog', [
            'posts' => $posts
        ]);
    }
    public function one(Request $request, string $id)
    {
        $post = Post::find($id)->toArray();
        // $posts = Post::all()->where('id', '=', )->toArray();
        return view('single', [
            'post' => $post
        ]);
    }
    public function add()
    {
        return view('new');
    }
    public function store(RegisterPostRequest $request)
    {
        $post = Post::create([
            "title" => $request['title'],
            "sub_title" => $request['sub_title'],
            "content" => $request['content']
        ]);
        return redirect(URL::route('route.single', ['id' => $post->id]));
    }
    public function remove(Request $request, string $id)
    {
        Post::find($id)->delete();
        return redirect(URL::route('route.home'));
    }
    public function edit(Request $request, string $id)
    {
        # code...
        $post = Post::find($id);
        return view('new', [
            'post' => $post
        ]);
    }
    public function update(UpdatePost $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return redirect(URL::route('route.single', ['id' => $post->id]));
    }
}
