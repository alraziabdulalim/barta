<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class SearchController extends Controller
{
    public function userSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $query = trim($request->input('search'));

        $users = User::where('username', 'like', "%{$query}%")
            ->orWhere(DB::raw("first_name || ' ' || last_name"), 'like', "%{$query}%")
            ->orWhere('first_name', 'like', "%{$query}%")
            ->orWhere('last_name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->paginate(2);

        return view('users.searches.user-search', compact('users'));
    }
}
