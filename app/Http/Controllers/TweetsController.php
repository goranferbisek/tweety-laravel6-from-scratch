<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Support\Facades\Storage;

class TweetsController extends Controller
{
    public function index()
    {
        // reflash because of reloading after ajax request
        session()->reflash();

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

        session()->flash('message', 'Your tweet is published!');

        return redirect()->route('home');
    }

    public function destroy(Tweet $tweet)
    {
        Storage::delete($tweet->image);

        $tweet->delete();

        return back();
    }
}
