@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <div class="row" id="margin" >
            <div class="col s12">
                <img class="responsive-img" id="image-size" src="../image/single-bird.jpg" alt="bird">
            </div>
            <div class="col s12 m6 l3">
                <form action="/showUserProfile" method="get">
                    @csrf
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>User's Profile</strong></button>
                </form>
            </div>

            <div class="col s12 m6 l3">
                <form action="/editUserProfileForm" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Edit Profile</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l3">
                <form action="/deleteUserProfileForm" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Delete Profile</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l3">
                <form action="/tweetFeed" method="get">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>All Tweets</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l3">
                <form action="/showAllUsers" method="get">
                    @csrf
                <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Follow</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l3">
                <form action="/createTweetForm" method="get">
                    @csrf
                <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Create Tweet</strong></button>
                </form>
            </div>
            <div class="divider"></div>
        </div>
        @guest
            <blockquote>Go Sign Up!</blockquote>
        @else
            <h3 id="margin"><span> WELCOME</span><strong  id="welcome"> {{ Auth::user()->name }}</strong></h3>
            <div class="row">
                <form class="col s12" id="margin" action="/searchTweet" method="post">
                    <div class="input-field col s8 m8 l8">
                        @csrf
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="searchText" required autocomplete="searchText">
                        <label>By Author</label>
                    </div>
                    <div class="col s4 m4 l4">
                        <button class="btn pink darken-1" id="border-style" type="submit" name="search" autofocus required autocomplete="search"><i class="material-icons"> search</i></button>
                    </div>
                </form>
            </div>
            @foreach ($tweets as $tweet)
                @php
                    $count = sizeOf(\App\Tweet::find($tweet->id)->likes);
                    $comments = \App\Tweet::find($tweet->id)->comments;
                @endphp

                <div class="card-panel lime lighten-5" id="margin" >
                    <br>
                    <div class="col s12 padding-left-right">
                        {{-- show the tweets here --}}
                        <div class="col s12">
                            @php
                                $tweetUser = \App\User::find($tweet->user_id);
                            @endphp
                            <p class="left-align user-font"><span>@</span>{{$tweetUser->name}}</p>
                            <p class="flow-text left-align" id="tweet-font-style">{{$tweet->content}}</p>
                            <p class="flow-text left-align" id="tweet-font-style">{{$tweet->created_at}}</p><br><br>
                        </div>
                        @if (Auth::user()->id == $tweet->user_id)
                            <div class="row">
                                <div class="col s6 m6 l6">
                                    <form action="/editTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        <button class="btn-small pink darken-1" id="border-style" type="submit" value="{{$tweet->id}}">Edit</button><br><br>
                                    </form>
                                </div>
                                <div class="col s6 m6 l6">
                                    <form action="/deleteTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        <button class="btn-small pink darken-1" id="border-style" type="submit" value="{{$tweet->id}}">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="divider"></div>
                    <div class="row s12 m12 l12 padding-left-right">
                        <div class="col s4 m3 l3">
                            <form action="/saveLike" method="post">
                                @csrf
                                <div class="col s3 m2 l2 pull-s1 pull-m1 pull-l1">
                                    <br>
                                    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                    <button class="btn-tiny pink-text text-darken-5 light-green lighten-5" id="border-style" type="submit" value="{{$tweet->id}}"><strong><i class="material-icons">favorite_border</i></strong></button>
                                </div>
                                <div class="col s1 m1 l1 push-s3 push-m2 push-l2">
                                    <br>
                                    <label id="font-style">{{$count}}</label>
                                </div>
                            </form>
                        </div>
                        <div class="col s8 m9 l9">
                            <form action="/saveComment" method="post">
                                <div class="col s1 m1 l1 push-s7 push-m8 push-l8">
                                    <br>
                                    <button class="btn-floating btn-medium waves-effect waves-light pink" id="border-style" type="submit" name="submit" value="{{$tweet->id}}"><i class="material-icons">add</i></button>
                                </div>
                                <div class="input-field col s7 m8 l8 pull-s1 pull-m1 pull-l1">
                                    @csrf
                                    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                    <input type="text" name="comment" required autocomplete="comment">
                                    <label>Comment</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-panel col s12 padding-left-right">
                        @if (sizeOf($comments)==0)
                            <p> No Comments!</p>
                            @else
                                @foreach ($comments as $comment)
                                    <div class="divider"></div><br>
                                    @php
                                        $user = \App\User::find($comment->user_id);
                                    @endphp
                                    <div class="col s12">
                                        <div class=" row col s12 ">
                                            <div class="col s6 center-align">
                                                <span class="comment-user">{{$user->name}} : </span>
                                            </div>
                                            <div class="col s6 left-align">
                                                <span id="font-style"> {{$comment->content}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col s12">
                                            @if (Auth::user()->id == $comment->user_id)
                                                <div class="col s6 center-align">
                                                    <form action="/commentForm" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                                        <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Edit</button>
                                                    </form>
                                                </div>
                                                <div class="col s6 center-align">
                                                    <form action="/deleteComment" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                                        <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                    </div>
                                    <div class="divider"></div>
                                @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endguest
    </div>
@endsection
