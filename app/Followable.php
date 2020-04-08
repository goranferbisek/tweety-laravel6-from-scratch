<?php

namespace App;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function follows()
    {
        return $this->belongsToMany(
            User::class,
            'follows', // expects user_user table because of naming convention
            'user_id',
            'following_user_id'
        );
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id);
    }
}