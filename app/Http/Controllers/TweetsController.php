<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255',
            'image' => 'image'
        ]);

        $attributes['user_id'] = auth()->id();

        if (request('image')) {
            $attributes['image'] = request('image')->store('tweet-img');
        }

        Tweet::create($attributes);

        return redirect()->route('home');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return back();
    }
}
