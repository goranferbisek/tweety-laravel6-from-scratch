<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        if ($tweet->isLikedBy(current_user())) {
            $tweet->deleteLike();
        } else {
            $tweet->like(current_user());
        }

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        if ($tweet->isDislikedBy(current_user())) {
            $tweet->deleteLike();
        } else {
            $tweet->dislike(current_user());
        }

        return back();
    }
}
