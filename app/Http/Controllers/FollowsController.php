<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user, Request $request){

        auth()->user()->toggleFollow($user);

        $returnMsg = 'Unfollowed: '.$user->username;

        if(auth()->user()->following($user)){
            $returnMsg = 'Now Following: '.$user->username;
        }

        return back()->with('success',$returnMsg);

    }


}
