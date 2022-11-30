<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\UpdatePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    public function index()
    {
        User::create([
            'name' => 'Jonathan',
            'email' => 'boyer@grafikart.fr',
            'password' => '123@2022azerty'
        ]);
        return response('User Created');
    }

    public function list()
    {
        $posts = Post::all();
        return view('blog', [
            'posts' => $posts
        ]);
    }
    public function one(Request $request, string $id)
    {
        $post = Post::with('category')->find($id);
        return view('single', [
            'post' => $post
        ]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('new', [
            'categories' => $categories
        ]);
    }
    public function store(RegisterPostRequest $request)
    {
        $post = Post::create([
            "title" => $request['title'],
            "sub_title" => $request['sub_title'],
            "content" => $request['content'],
            "cat_id" => $request['categorie']
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
