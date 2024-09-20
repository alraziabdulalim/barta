<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function  index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        return view('users.profile.index', compact('user'));
    }

    public function  edit()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();


        return view('users.profile.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $id = Auth::id();

        $validatedData = $request->validated();

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'User updated successfully.');
    }
}
