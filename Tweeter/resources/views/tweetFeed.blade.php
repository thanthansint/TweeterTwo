@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Welcome To Tweeter</h3>
        <span>
            <form action="/showAllUsers" method="get">
                @csrf
            <button type="submit" value="">Follow</button>
            </form>
        </span>
        <form action="/showUserProfile" method="get">
            @csrf
            <button type="submit" value="">User's Profile</button>
        </form>
        <form action="/editUserProfileForm" method="post">
            @csrf
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <button type="submit" value="">Edit Profile</button>
        </form>
        <form action="/deleteUserProfileForm" method="post">
            @csrf
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <button type="submit" value="">Delete Profile</button>
        </form>
        <form action="/tweetFeed" method="get">
            @csrf
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <button type="submit" value="">All Tweets</button>
        </form>
        <div>
            <form action="/searchTweet" method="post">
                @csrf
                <input type="text" name="searchText" value="">
                <button type="submit" name="search">Search</button>
            </form>
        </div>
        @guest
            <p>Go Sign Up!</p>
        @else
            <br>
            <p>Welcome {{ Auth::user()->name }}</p>
            @foreach ($tweets as $tweet)
                @php
                    $count = sizeOf(\App\Tweet::find($tweet->id)->likes);
                @endphp
                <div>
                    <div>
                        <br>
                        <p>{{$tweet->content}}</p>
                        <p>{{$tweet->created_at}}</p>

                        <form action="/saveLike" method="post">
                            @csrf
                            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            <button type="submit" value="{{$tweet->id}}"><i class="fal fa-thumbs-up"></i>Like</button>
                            <span>{{$count}}</span>
                        </form>
                        <form action="/saveComment" method="post">
                            @csrf
                            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            <span>Comment</span>
                            <input type="text" name="comment">
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
                                <button type="submit" value="{{$tweet->id}}">Edit Tweet</button>
                            </form>
                            <form action="/deleteTweetForm" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$tweet->id}}">
                                <button type="submit" value="{{$tweet->id}}">Delete Tweet</button>
                            </form>
                        </div>
                        <br><br>
                    @endif
                </div>
            @endforeach
        @endguest
    </div>
@endsection

