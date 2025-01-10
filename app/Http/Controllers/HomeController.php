<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $friendSuggestions = $user->getNonFriends()->take(10);
        return view('home.index', compact('friendSuggestions'));
    }

    public function profile()
    {
        $user = Auth::user();
        $friends = $user->friends()
        ->wherePivot('status', 'accepted')->get()->merge(
            $user->friendRequests()->wherePivot('status', 'accepted')->get()
        );
        $requests = Auth::user()->friendRequests->where('pivot.status', 'pending');
        return view('home.profile', compact('friends', 'requests'));
    }
}
