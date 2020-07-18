<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        if (!current_user()->following($user)) {
            session()->flash('message', "You followed @$user->username");
        }

        auth()->user()->toggleFollow($user);

        return back();
    }
}
