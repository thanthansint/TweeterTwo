<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TweetController extends Controller
{
    public function show() {
        if (Auth::check()) {
           $result = \App\Tweet::all();
            return view('tweetFeed',['tweets'=>$result]);
        } else {
            return view('tweetFeed');
        }
    }

    public function showTweet($id){
        $tweets =App\Tweet::find($id);
        return view('profile', ['tweets' => $tweets]);
    }
    public function createTweetForm() {
        return view('createTweetForm');
    }

    public function createTweet(Request $request) {
        $validatedData = $request->validate([
            'content' => 'required|max:250'
        ]);

        if (Auth::check()) {
            $tweet =new \App\Tweet;
            $tweet->content = $request->content;
            $tweet->user_id = Auth::user()->id;
            $tweet->save();

           $result = \App\Tweet::all();
            return view('tweetFeed',['tweets'=>$result]);
         } else {
            return view('tweetFeed');
        }
        // return view('createTweet');
    }
    public function showEditForm(Request $request){
        $tweet = \App\Tweet::find($request->id);
        return view('editTweetForm', ['tweet'=>$tweet]);
    }
    public function editTweet(Request $request){
        $tweet = \App\Tweet::find($request->id);
        $tweet->content = $request->content;
        $tweet->save();
        $result = \App\Tweet::all();
        return view('tweetFeed',['tweets'=>$result]);
    }
    public function deleteTweet(Request $request){
           \App\Tweet::destroy($request->id);
           $result = \App\Tweet::all();
            return view('tweetFeed', ['tweets'=>$result] );
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
        if (Auth::check()) {
            $like = new \App\Like;
            $like->user_id = Auth::user()->id;
            $like->tweet_id = $request->tweetId;
            $like->save();
            $result = \App\Tweet::all();
            return view('tweetFeed', ['tweets'=>$result]);
        } else {
            return view('tweetFeed');
        }
    }
    public function saveComment(Request $request){
        if (Auth::check()) {
            $comment = new \App\Comment;
            $comment->user_id = Auth::user()->id;
            $comment->tweet_id = $request->tweetId;
            $comment->content = $request->comment;
            $comment->save();
            $result = \App\Tweet::all();
            return view('tweetFeed', ['tweets'=>$result]);
        } else {
            return view('tweetFeed');
    }
    }
    public function commentForm(Request $request) {

        return view('commentForm', ['tweet'=>$request->tweetId, 'comment'=>$request->commentId]);
    }
    public function showComments(Request $request){
        if (Auth::check()) {
            $comments = \App\Comment::where('tweet_id', $request->tweetId)->get();
            if (sizeOf($comments) > 0) {
                //$user = \App\User::find($request->userName);
                return view('comments',['comments' => $comments]);
            } else {
                return view('tweetFeed');
            }
        }
    }
    public function editComment(Request $request){
        $comment = \App\Comment::find($request->commentId);
        $comment->content = $request->content;
        $comment->save();
        $result = \App\Tweet::all();
        return view('tweetFeed',['tweets'=>$result]);
    }
    public function deleteComment(Request $request){
        \App\Comment::destroy($request->commentId);
        $result = \App\Tweet::all();
         return view('tweetFeed', ['tweets'=>$result] );
 }
}
