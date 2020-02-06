<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TweetController extends Controller
{
    public function show() {
        // if (Auth::check()) {
        //    $result = \App\Tweet::all();
        //     return view('tweetFeed',['tweets'=>$result]);
        // } else {
        //     return view('tweetFeed');
        // }
        $result = \App\Tweet::all();
        return view('tweetFeed',['data'=> $result]);
    }

    public function showTweet($id){
        $tweets =App\Tweet::find($id);
        return view('profile', ['tweets' => $tweets]);
    }
    public function showCreateForm() {
        return view('createTweetForm');
    }

    public function createTweet(Request $request) {
        $validatedData = $request->validate([
            'content' => 'required|max:250',
            'author' => 'required|max:50'
        ]);

        // if (Auth::check()) {
            $tweet =new \App\Tweet;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

           $result = \App\Tweet::all();
            return view('tweetFeed',['tweets'=>$result]);
        //  } else {
        //     return view('tweetFeed');
        // }
        // return view('createTweet');
    }
    public function showEditForm(Request $request){
        $tweet = \App\Tweet::find($request->id);
        return view('editTweetForm', ['tweet'=>$tweet]);
    }
    public function editTweet(Request $request){
        //$tweet =new \App\Tweet;
        $tweet = \App\Tweet::find($request->id);
        $tweet->author = $request->author;
        $tweet->content = $request->content;
        $tweet->save();
        $result = \App\Tweet::all();
        return view('profile',['tweets'=>$result]);
        //return view('editTweet',["id"=> $request->edit] );
    }
    public function deleteTweet(Request $request){
           \App\Tweet::destroy($request->id);
           $result = \App\Tweet::all();
            return view('profile', ['tweets'=>$result] );
    }
    public function showAllUsers(){
        if (Auth::check()) {
            $result = \App\User::all();
            $follows=\App\Follows::where('following',Auth::user()->name)->get();
            return view('allUsers',['users'=>$result, 'follows'=>$follows]);
        } else {
            return redirect('/home');
        }
    }
    public function followUsers(Request $request){
        $follows = new \App\Follows;
        $follows->following= Auth::user()->name;
        $follows->followed=$request->name;
        $follows->save();

        return view('followUsers', ['follows'=>$follows]);
    }
    public function saveLike(Request $request){
        $user = \App\User::find($request->userName);
        $like = new \App\Like;
        $like->user_id = $user->id;
        $like->tweet_id = $request->tweetId;
        $like->save();
        return view('tweetFeed');
    }
    public function saveComment(Request $request){
        $user = \App\User::find($request->userName);
        $comment = new \App\Comment;
        $comment->user_id = $user->id;
        $comment->tweet_id = $request->tweetId;
        $comment->content = $request->comment;
        $comment->save();
        return view('tweetFeed');
    }
    public function commentForm() {
        return view('commentForm');
    }
    public function showComments(Request $request){
        $comments = \App\Comment::find($request->tweetId);
        if (sizeof($comments) > 0) {
            $user = \App\User::find($request->userName);
            return view('comments',['comments' => $comments], ['user'=> $user]);
        } else {
            return view('tweetFeed');
        }
    }
}
