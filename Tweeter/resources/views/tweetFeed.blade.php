@extends('masterUser')

@section('content')
    @guest
        <p>Go Sign Up!</p>
    @else
        <p id="welcome">Welcome {{ Auth::user()->name }}</p>
        @foreach ($data as $tweet)
            <div id="tweet-frame">
                <div>
                    <p><strong>{{$tweet->author}}</strong></p>
                    <p>{{$tweet->content}}</p>
                    <p>{{$tweet->created_at}}</p>
                    <form action="/saveLike" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userName" value="{{Auth::user()->name}}">
                        <button type="submit" value="{{$tweet->id}}"><i class="fal fa-thumbs-up"></i>Like</button>
                    </form>
                    <form action="/saveComment" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userName" value="{{Auth::user()->name}}">
                        <span>Comment</span>
                        <input type="text" name="comment" value="">
                        <input type="submit" name="submit" value="-->">
                    </form>
                    <form action="/showComments" method="post">
                        @csrf
                        <input type="hidden" name="tweetId" value="{{$tweet->id}}">
                        <input type="hidden" name="userName" value="{{Auth::user()->name}}">
                        <button type="submit" value="{{$tweet->id}}"><i class="far fa-comment"></i></button>
                    </form>
                </div>
            @if (Auth::user()->name == $tweet->author)
                <div>
                    <form action="/editTweetForm" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tweet->id}}">
                        <button type="submit" value="{{$tweet->id}}">Edit</button>
                    </form>
                </div>
                <div>
                    <form action="/deleteTweet" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$tweet->id}}">
                        <button type="submit" value="{{$tweet->id}}">Delete</button>
                    </form>
                </div>
            @endif
            </div>
        @endforeach
    @endguest
@endsection

