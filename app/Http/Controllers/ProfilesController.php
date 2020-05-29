<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {

        $tweets = $user->tweets()->latest()->get();

      return view('profiles.show',[
          'user'=> $user,
          'tweets'=> $tweets
      ]);
    }
}
