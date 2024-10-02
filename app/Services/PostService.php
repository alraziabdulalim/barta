<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function handlePost(Request $post)
    {
        $post = $this->validationPost($post);
        return $this->create($post);
    }
    protected function create(array $post)
    {
        return Post::create($post);
    }

    protected function validationPost(Request $post)
    {
        $validatedData = $post->validate([
            'barta' => 'required|string|max:255',
        ]);

        $userId = Auth::user()->id;
        $validatedData['user_id'] = $userId;
        return $validatedData;
    }
}
