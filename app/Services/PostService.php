<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function handlePost(Request $request)
    {
        $validatedData = $this->validatePost($request);
        return $this->create($validatedData);
    }

    protected function create(array $postData)
    {
        return Post::create($postData);
    }

    protected function validatePost(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'barta'   => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $validatedData = $this->pictureStore($request, null, $user, $validatedData);
        $validatedData['user_id'] = $user->id;

        return $validatedData;
    }

    public function update($request, $post)
    {
        $user = Auth::user();

        if ($user->id !== $post->user_id) {
            return redirect()->back()->withErrors(['error' => 'Edit permission has been restricted.']);
        }

        $validatedData = $request->validated();
        $validatedData = $this->pictureStore($request, $post, $user, $validatedData);

        $post->update($validatedData);

        return $post;
    }

    public function pictureStore($request, $post = null, $user, $validatedData)
    {
        if ($request->hasFile('picture')) {
            $extension = $request->file('picture')->getClientOriginalExtension();
            $filename = uniqid($user->first_name . '_') . '.' . $extension;

            $validatedData['picture'] = $request->file('picture')->storeAs('pictures', $filename, 'public');

            if ($post && $post->picture) {
                Storage::disk('public')->delete($post->picture);
            }
        }

        return $validatedData;
    }
}
