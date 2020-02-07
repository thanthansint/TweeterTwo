@extends('layouts.app')

@section('content')

    <h3>Welcome To Tweeter</h3>
    <a href="createTweetForm" id="tab1">Create Tweet</a>
    <a href="userProfile" id="tab1">User's Profile</a><br><br>
    <div>
        <input type="text" name="search" id="search">
        <button type="submit" name="search" value="">Search</button>
    </div>
    @guest
        <p>Go Sign Up!</p>
    @else
        <br>
        <p id="welcome">Welcome {{ Auth::user()->name }}</p>
        @foreach ($tweets as $tweet)
            <div id="tweet-frame">
                <div id="tweet-style">
                    <br>
                    <p>{{$tweet->content}}</p>
                    <p>{{$tweet->created_at}}</p>
                    <form action="/followUsers" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="followedUserId" value="{{$tweet->user_id}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button type="submit" value="{{$tweet->id}}">Follow</button>
                    </form>
                    <form action="/saveLike" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button type="submit" value="{{$tweet->id}}"><i class="fal fa-thumbs-up"></i>Like</button>
                    </form>
                    <form action="/saveComment" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <span>Comment</span>
                        <input type="text" name="comment" value="">
                        <input type="submit" name="submit" value="-->">
                    </form>
                    <form action="/showComments" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button type="submit" value="{{$tweet->id}}"><i class="far fa-comment"></i>Show Comments</button>
                    </form>
                </div>
            @if (Auth::user()->id == $tweet->user_id)
                <div>
                    <form action="/editTweetForm" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tweet->id}}">
                        <button type="submit" value="{{$tweet->id}}">Edit</button>
                    </form>
                    <form action="/deleteTweet" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tweet->id}}">
                        <button type="submit" value="{{$tweet->id}}">Delete</button>
                    </form>
                </div>
                <br><br>
            @endif
            </div>
        @endforeach
    @endguest
@endsection

