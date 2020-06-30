<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT
                tweet_id,
                sum(liked) as likes,
                sum(! liked) as dislikes
            FROM likes
            GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
            );
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user
            ->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user
            ->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function deleteLike() {
        $this->likes()->where('user_id', auth()->id())->delete();
    }
}