<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked'=> $liked
        ]);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
