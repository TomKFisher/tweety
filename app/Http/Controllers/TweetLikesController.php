<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        if($tweet->isLikedBy(current_user())){
            $tweet->indifferent(current_user());
        }else{
            $tweet->like(current_user());
        }

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        if ($tweet->isDislikedBy(current_user())) {
            $tweet->indifferent(current_user());
        }else {
            $tweet->dislike(current_user());
        }

        return back();
    }
}
