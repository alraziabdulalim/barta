<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(5);

        return view('users.posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $post = $this->postService->handlePost($request);
        return redirect()->route('posts')->with('post-create', 'post-create-yes');
    }

    public function edit($id)
    {
        $post = Auth::user()->posts()->where('id', $id)->firstOrFail();

        return view('users.posts.edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if (Auth::user()->id !== $post->user_id) {
            return redirect()->back()->withErrors(['error' => 'Edit permission has been restricted.']);
        }

        $post->update($request->validated());

        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Post updated successfully.');

    }

    public function show($id)
    {
        $post = Auth::user()->posts()->where('id', $id)->firstOrFail();

        return view('users.posts.show', ['post' => $post]);
    }
}
