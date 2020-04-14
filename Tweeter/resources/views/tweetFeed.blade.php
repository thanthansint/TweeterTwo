@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <div class="welcome-header" id="margin">
            <span >WELCOME</span><span id="welcome"> <strong> {{ Auth::user()->name }}</strong></span>
        </div>
        <div class="row" id="margin" >
            <div class="col s12">
                <img class="responsive-img" id="image-size" src="../image/single-bird.jpg" alt="bird">
            </div>
            <div class="col s12 m6 l4">
                <form action="/showUserProfile" method="get">
                    @csrf
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>User's Profile</strong></button>
                </form>
            </div>

            <div class="col s12 m6 l4">
                <form action="/editUserProfileForm" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Edit Profile</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l4">
                <form action="/deleteUserProfileForm" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Delete Profile</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l4">
                <form action="/tweetFeed" method="get">
                    @csrf
                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                    <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>All Tweets</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l4">
                <form action="/showAllUsers" method="get">
                    @csrf
                <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Follow</strong></button>
                </form>
            </div>
            <div class="col s12 m6 l4">
                <form action="/createTweetForm" method="get">
                    @csrf
                <button class="btn-flat waves-effect waves-purple grey-text text-darken-4" id="font-style" type="submit" value=""><strong>Create Tweet</strong></button>
                </form>
            </div>
        </div>
        <div class="divider"></div>

        @guest
            <blockquote>Go Sign Up!</blockquote>
        @else
            <div class="row">
                <form class="col s12" id="margin" action="/searchTweet" method="post">
                    <div class="input-field col s8 m8 l8">
                        @csrf
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="searchText" required autocomplete="searchText">
                        <label>By Author</label>
                    </div>
                    <br>
                    <div class="col s4 m4 l4">
                        <button class="btn pink darken-1" id="border-style" type="submit" name="search" autofocus required autocomplete="search"><i class="material-icons"> search</i></button>
                    </div>
                </form>
            </div>


            @foreach ($tweets as $tweet)
                @php
                    $count = sizeOf(\App\Tweet::find($tweet->id)->likes);
                    $comments = \App\Tweet::find($tweet->id)->comments;
                    $like = sizeOf(\App\Like::where('tweet_id', $tweet->id)->where('user_id',Auth::user()->id)->get());
                    // $username = \App\User::where('user_id',Auth::user()->id)->get();
                    $gifs = \App\Gif::find($tweet->id)->gifs;
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
                            <p class="flow-text left-align" id="tweet-font-style">{{$tweet->created_at}}</p>
                            <p class="flow-text left-align" id="tweet-font-style">{{$tweet->content}}</p><br><br>

                            @php
                                $date1 = strtotime(\Carbon\Carbon::parse($tweet->created_at));
                                $date2 = strtotime(Carbon\Carbon::now());

                                $diff = abs($date2 - $date1);
                                $years = floor($diff / (365*60*60*24));
                                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                                $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
                                $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                            @endphp
                            <p class='flow-text left-align' id='tweet-font-style'>Posted: {{$days}}d : {{$hours}}h : {{$minutes}}m : {{$seconds}}s ago</p><br>
                        </div>

                        @if (Auth::user()->id == $tweet->user_id)
                            <div class="row">
                                <div class="col s6 m6 l6">
                                    <form action="/editTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        {{-- /////// --}}
                                        <input type="hidden" name="url" value="{{url()->full()}}">
                                        <button class="btn-small pink darken-1" id="border-style" type="submit" value="{{$tweet->id}}">Edit</button><br><br>
                                    </form>
                                </div>
                                <div class="col s6 m6 l6">
                                    <form action="/deleteTweetForm" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tweet->id}}">
                                        {{-- //////// --}}
                                        <input type="hidden" name="url" value="{{url()->full()}}">
                                        <button class="btn-small pink darken-1" id="border-style" type="submit" value="{{$tweet->id}}">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="divider"></div>
                    <div class="row s12 m12 12 ">
                        <div class="col s6 m6 l6 center">
                            {{-- <form action="/saveLike" method="post">
                                @csrf
                                    <br>
                                    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                    @if ($like==0)
                                        <button class="btn-tiny blue-text text-darken-5 light-green lighten-5" id="border-style" type="submit" value="{{$tweet->id}}"><strong><i class="material-icons">favorite</i></strong></button>
                                    @elseif ($like==1)
                                        <button class="btn-tiny red-text text-darken-5 light-green lighten-5" id="border-style" type="submit" value="{{$tweet->id}}"><strong><i class="material-icons">favorite</i></strong></button>
                                    @endif
                                    <label id="font-style">{{$count}}</label>
                            </form> --}}
                        <Like v-bind:likes={{ $like }} v-bind:like-count={{ $count }} v-bind:userid={{ Auth::user()->id }} v-bind:tweetid={{ $tweet->id }} />
                        </div>
                        {{-- ///////////// --}}
                        {{-- <div class="col s6 m6 l6 center">
                            <form action="/saveUnlike" method="post">
                                @csrf
                                    <br>
                                    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                    @if ($like==0)
                                        <button class="btn-tiny light-green lighten-5" id="border-style" type="submit" value="{{$tweet->id}}"><strong><i class="material-icons">favorite_border</i></strong></button>
                                    @else
                                        <button class="btn-tiny light-green lighten-5" id="border-style" type="submit" value="{{$tweet->id}}"><strong><i class="material-icons">favorite</i></strong></button>
                                    @endif
                            </form>

                        </div> --}}
                    </div>

                    <div class="row s12 m12 l12 padding-left-right">
                        <form action="/saveComment" method="POST">
                            {{-- {{method_field('POST')}} --}}
                            <div class="col s1 m2 l2 push-s10 push-m10 push-l10">
                                <br>
                                <button class="btn-floating btn-medium waves-effect waves-light pink" id="border-style" type="submit" name="submit" value="{{$tweet->id}}"><i class="material-icons">add</i></button>
                            </div>
                            <div class="input-field col s10 m10 l10 pull-s1 pull-m2 pull-l2">
                                @csrf
                                <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                                <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                <input type="text" name="comment" required autocomplete="comment">
                                <label>Comment</label>
                            </div>
                        </form>
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

                                    <div class=" row col s12">
                                        <div class="col s6 right-align">
                                            <span class="comment-user">{{$user->name}} : </span>
                                        </div>
                                        <div class="col s6 left-align">
                                            <span id="font-style"> {{$comment->content}}</span>
                                        </div>
                                    </div>

                                    <div class="row col s12">
                                            @if (Auth::user()->id == $comment->user_id)
                                                <div class="col s6 center-align">
                                                    <form action="/commentForm" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                                        <input type="hidden" name="url" value="{{url()->full()}}">
                                                        <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Edit</button>

                                                    </form>
                                                </div>
                                                <div class="col s6 center-align">
                                                    <form action="/deleteComment" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                                                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                                        <input type="hidden" name="url" value="{{url()->full()}}">
                                                        <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                    </div>
                                    <div class="divider"></div>
                                @endforeach
                        @endif
                    </div>

                    {{-- GIF search --}}
                    <div class="col s12">
                        @php
                            $gifUser = \App\User::find(Auth::user()->id);
                        @endphp
                        <Gif username="{{ $gifUser->name }}" :gifArray = {{ $gifs }} v-bind:userid={{ Auth::user()->id }} v-bind:tweetid={{ $tweet->id }} />
                    </div>
                </div>
            @endforeach

            {{-- pagination links --}}
            <div>
                <nav>
                {{ $tweets->links() }}
                </nav>
            </div>
            {{-- //// --}}
        @endguest
    </div>
@endsection
