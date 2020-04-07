<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class TweetController extends Controller
{
    public function noUser(Request $request) {
        return view('noUser');
    }
    public function searchTweet(Request $request) {
        $user = \App\User::where('name', $request->searchText)->get();
        if (sizeOf($user) >0) {
            foreach ($user as $u){
                $result = \App\Tweet::where('user_id', $u->id)->paginate(2);
            }
                return view('tweetFeed',['tweets'=>$result]);
        } else {
            return view('noUser');
        }
    }
    public function show() {
        if (Auth::check()) {
           //$result = \App\Tweet::orderBy('created_at', 'DESC')->get();
           $result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
            return view('tweetFeed',['tweets'=>$result]);
        } else {
            return view('tweetFeed');
        }
    }
    // public function showTweet($id){
    //     $tweets =App\Tweet::find($id);
    //     return view('profile', ['tweets' => $tweets]);
    // }
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
            $result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
            return view('tweetFeed',['tweets'=>$result]);
         } else {
            return view('tweetFeed');
        }
    }
    public function showEditForm(Request $request){
        $tweet = \App\Tweet::find($request->id);        //////
        return view('editTweetForm', ['tweet'=>$tweet, 'url'=>$request->url]);
    }
    public function editTweet(Request $request){
        $tweet = \App\Tweet::find($request->id);
        $tweet->content = $request->content;
        $tweet->save();
        //$result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
        // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
        //return view('tweetFeed',['tweets'=>$result]);
        return redirect($request->url);
    }
    public function deleteTweetForm(Request $request){
        $tweet = \App\Tweet::find($request->id);
        return view('deleteTweetForm', ['tweet'=>$tweet, 'url'=>$request->url]);
    }
    public function deleteTweet(Request $request){
        if (isset($request->yes)) {
            $results = \App\Like::where('tweet_id', $request->id)->get();
            if (sizeOf($results)>0) {
                foreach ($results as $r) {
                    \App\Like::destroy($r->id);
                }
            }

            $result2 = \App\Comment::where('tweet_id',$request->id)->get();
            if (sizeOf($result2)>0) {
                foreach ($result2 as $r) {
                    \App\Comment::destroy($r->id);
                }
            }
            \App\Tweet::destroy($request->id);
        }
        //$result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
        // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
        //return view('tweetFeed', ['tweets'=>$result] );
        ///////
        return redirect($request->url);
    }
    public function showAllUsers(){
        if (Auth::check()) {
            ///////
            $result = \App\User::paginate(2);
            $follows=\App\FollowRelationship::where('user_id',Auth::user()->id)->get();
            return view('followUsers',['users'=>$result, 'follows'=>$follows]);
        } else {
            return redirect('/home');
        }
    }
    public function followUsers(Request $request){
        $follows = new \App\FollowRelationship;
        $follows->user_id = Auth::user()->id;
        $follows->followedUser_id = $request->followedUserId;
        $follows->save();
        ////
        $result = \App\Tweet::paginate(2);
        return view('tweetFeed', ['tweets'=>$result]);
    }
    public function unfollowUsers(Request $request){
        $unfollowUser = \App\FollowRelationship::where('followedUser_id',$request->unfollowedUserId)->where('user_id', Auth::user()->id)->get();
        foreach ($unfollowUser as $unfollow){
            \App\FollowRelationship::destroy($unfollow->id);
        }
        ////////
        $result = \App\Tweet::paginate(2);
        return view('tweetFeed', ['tweets'=>$result]);
    }

    public function saveLike(Request $request){
        $find = \App\Like::where('user_id', Auth::user()->id)->where('tweet_id',$request->tweetId)->get();

        if (Auth::check()) {
            if (sizeOf($find)==0) {
                $like = new \App\Like;
                $like->user_id = Auth::user()->id;
                $like->tweet_id = $request->tweetId;
                $like->save();
            }
            $result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
            return view('tweetFeed', ['tweets'=>$result]);
        }
    }

    public function likeCount(Request $request) {
    return response()->json(['message'=> $request->tweetid]);
        $find = \App\Like::where('user_id', Auth::user()->id)->where('tweet_id', $request->tweetid)->get();
        if (Auth::check()) {
            if (sizeOf($find)==0) {
                $like = new \App\Like;
                $like->user_id = Auth::user()->id;
                $like->tweet_id = $request->tweetid;
                $like->save();
            }
            return response()->json(['message'=> "Success like"]);
        }else {
            return response()->json(['error'=>"Error"]);
    }
    }
    public function unlikeCount(Request $request){
        $likeUsers = \App\Like::where('user_id', Auth::user()->id)->where('tweet_id',$request->tweetid)->get();
        if (Auth::check()) {
            if (sizeOf($likeUsers)>0) {
                foreach ($likeUsers as $likeUser){
                    \App\Like::destroy($likeUser->id);
                }
            }
                return response()->json(['message'=> "Successfully Unlike"]);
        }else {
            return response()->json(['error'=>"Error"]);
        }
    }

    public function saveUnlike(Request $request){
        $likeUsers = \App\Like::where('user_id', Auth::user()->id)->where('tweet_id',$request->tweetId)->get();
        if (sizeOf($likeUsers)>0) {
            foreach ($likeUsers as $likeUser){
                \App\Like::destroy($likeUser->id);
            }
        }
        $result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
        // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
        return view('tweetFeed', ['tweets'=>$result]);
    }

    public function saveComment(Request $request){
        if (Auth::check()) {
            $comment = new \App\Comment;
            $comment->user_id = Auth::user()->id;
            $comment->tweet_id = $request->tweetId;
            $comment->content = $request->comment;
            $comment->save();
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
            return redirect()->back();
            //return view('tweetFeed', ['tweets'=>$result]);
        } else {
            return view('tweetFeed');
        }
    }

    public function saveGif(Request $request){
        if (Auth::check()) {
            //error_log($request);
            $gif = new \App\Gif;
            $gif->user_id = Auth::user()->id;
            $gif->tweet_id = $request->tweetid;
            $gif->content = $request->gifcontent;
            $gif->save();
            return response()->json(['message'=> "Successfully Save GIF"]);
        } else {
            return response()->json(['error'=>"Error"]);
        }
    }

    public function showComments(Request $request){
        if (Auth::check()) {
            $comments = \App\Comment::where('tweet_id', $request->tweetId)->get();
            if (sizeOf($comments) > 0) {
                return view('comments',['comments' => $comments]);
            } else {
                return view('noComment');
            }
        }
    }
    public function commentForm(Request $request) {
        return view('commentForm', ['tweet'=>$request->tweetId, 'commentId'=>$request->commentId, 'url'=>$request->url]);
    }
    public function editComment(Request $request){
        $validatedData = $request->validate([
            'content' => 'required|max:250'
        ]);
        if ($request->content==null) {
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
            // return view('tweetFeed',['tweets'=>$result]);
            return redirect($request->url);
        } else {
            $comment = \App\Comment::find($request->commentId);
            $comment->content = $request->content;
            $comment->save();
            // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
            //return view('tweetFeed',['tweets'=>$result]);
            return redirect($request->url);
        }
    }
    public function deleteComment(Request $request){
        \App\Comment::destroy($request->commentId);
        //$result = \App\Tweet::orderBy('created_at', 'DESC')->paginate(2);
        // $result = \App\Tweet::orderBy('created_at', 'DESC')->get();
        //return view('tweetFeed', ['tweets'=>$result] );
        return redirect($request->url);
    }

    public function deleteGif(Request $request){
        if (Auth::check()) {
            // error_log($request->gifcontent);
            $gifs = \App\Gif::where('content', $request->gifcontent)->where('user_id', $request->userid)-> where('tweet_id', $request->tweetid)->get();
            if (sizeOf($gifs)>0) {
                foreach ($gifs as $gif){
                    \App\Gif::destroy($gif->id);
                }
            }
            return response()->json(['message'=> "Successfully Delete GIF"]);
        } else {
            return response()->json(['error'=>"Deleted Error"]);
        }
    }
}
