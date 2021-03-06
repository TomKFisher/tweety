<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );

    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $liked,
        ]);
    }

    public function indifferent($user = null)
    {
        if ($user == null) {
            $user = auth()->id();
        }

        $this->likes()->where('user_id', $user->id)->update([
            'liked' => null,
        ]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$this->likes()
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool)$this->likes()
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

}
