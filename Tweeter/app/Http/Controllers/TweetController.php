<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    function show() {
        if (Auth::check()) {
            // $tweets=DB::table('Tweets')->get();
           $result = \App\Tweet::all();
           //$result = \App\Tweet::find(4);
            return view('userHome',['tweets'=>$result]);
        } else {
            return view('userHome');
        }
    }

}
