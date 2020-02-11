@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <div class="card-panel  light-green lighten-5">
            <div class="row">
                <div class="col s12">
                    <h4>WELCOME TO TWEETER</span></h4>
                </div>
            </div>
            <div class="row" id="margin" >
                <div class="col s12 m6 l3">
                    <form action="/showUserProfile" method="get">
                        @csrf
                        <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">User's Profile</button>
                    </form>
                </div>

                <div class="col s12 m6 l3">
                    <form action="/editUserProfileForm" method="post">
                        @csrf
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">Edit Profile</button>
                    </form>
                </div>
                <div class="col s12 m6 l3">
                    <form action="/deleteUserProfileForm" method="post">
                        @csrf
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">Delete Profile</button>
                    </form>
                </div>
                <div class="col s12 m6 l3">
                    <form action="/tweetFeed" method="get">
                        @csrf
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">All Tweets</button>
                    </form>
                </div>
                <div class="col s12 m6 l3">
                    <form action="/showAllUsers" method="get">
                        @csrf
                    <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">Follow</button>
                    </form>
                </div>
                <div class="col s12 m6 l3">
                    <form action="/createTweetForm" method="get">
                        @csrf
                    <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">Create Tweet</button>
                    </form>
                </div>
            </div>
        </div>
        @guest
            <blockquote>Go Sign Up!</blockquote>
        @else
            <h5 class="grey-text text-darken-3" id="margin">WELCOME {{ Auth::user()->name }}</h5>
            <div class="row">
                <form class="col s12" action="/searchTweet" method="post">
                    <div class="input-field col s8 m8 l8">
                        @csrf
                        <input type="text" name="searchText">
                        <label>By Author</label>
                    </div>
                    <div class="col s4 m4 l4">
                        <button class="btn blue-grey darken-2" type="submit" name="search">Search</button>
                    </div>
                </form>
            </div>
            @foreach ($tweets as $tweet)
                @php
                    $count = sizeOf(\App\Tweet::find($tweet->id)->likes);
                @endphp
                <div>
                    <div class="card-panel">
                        <br>
                        <div class="col s12">
                            @if (Auth::user()->id == $tweet->user_id)
                            <div class="row">
                                <div class="col s6 m6 l6">
                                    <form action="/editTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        <button class="btn-small blue-grey darken-2" id="borderStyle" type="submit" value="{{$tweet->id}}">Edit</button><br><br>
                                    </form>
                                </div>
                                <div class="col s6 m6 l6">
                                    <form action="/deleteTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        <button class="btn-small blue-grey darken-2" id="borderStyle" type="submit" value="{{$tweet->id}}">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col s10 m10 l9">
                                <p class="flow-text" id="fontStyle">{{$tweet->content}}</p>
                                <p class="flow-text">{{$tweet->created_at}}</p><br><br>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s4 m4 l4">
                                <form action="/saveLike" method="post">
                                    @csrf
                                    <div class="col s2 m2 l2 pull-s2">
                                        <br>
                                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                        <button class="grey-text text-darken-4" type="submit" value="{{$tweet->id}}">Like</button>
                                    </div>
                                    <div class="col s2 m2 l2 push-s2">
                                        <br>
                                        <label>{{$count}}</label>
                                    </div>
                                </form>
                            </div>
                            <div class="col s8 m8 l8">
                                <form action="/saveComment" method="post">
                                    <div class="input-field col s6 m5 l4">
                                        @csrf
                                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                        <input type="text" name="comment">
                                        <label>Comment</label>
                                    </div>
                                    <div class="col s2 m3 l4 ">
                                        <br>
                                        <button><i class="Tiny material-icons" class="btn blue-grey darken-2" type="submit" name="submit" value="{{$tweet->id}}">add_box</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form action="/showComments" method="post">
                            @csrf
                            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            <button class="btn-small grey-text text-darken-4 card light-green lighten-5" type="submit" value="{{$tweet->id}}">Show Comments</button>
                        </form>
                    </div>
                </div>
                <div class="divider"></div>
            @endforeach
        @endguest
    </div>
@endsection

