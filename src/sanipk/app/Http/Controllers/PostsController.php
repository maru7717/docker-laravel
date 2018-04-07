<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
