<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'destroy']);
    }
    public function index ()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function store(Request $request)
    {
        $formInput =  $request->validate([
            'body' => ['required', 'max:255'],

        ]);

        $request->user()->posts()->create($formInput);

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }

}
