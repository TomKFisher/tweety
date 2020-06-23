<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TweetsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('tweets.index',[
            'tweets' => auth()->user()->timeline()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:255'
        ],[
          '*.max' =>'Tweet may not be bigger than 255 characters.'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $request->get('body')
        ]);

        return redirect()->route('home')->with('success','Tweet Created.');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return Redirect::back()->with('success','Tweet deleted.');
    }
}
