@extends('layouts.app')

@section('content')
<div class="container  center-align">
    @foreach ($comments as $comment)
    <div class="card-panel lime lighten-5">
        <p id="font-style"> {{ $comment->content }}</p><br>
        @if (Auth::user()->id == $comment->user_id)
            <form action="/commentForm" method="post">
                @csrf
                <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Edit Comment</button><br><br>
            </form>
            <form action="/deleteComment" method="post">
                @csrf
                <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
                <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                <button class="btn pink darken-1" id="border-style" type="submit" name="commentId" value="{{$comment->id}}">Delete Comment</button><br><br>
            </form>
        @endif
    </div>
    @endforeach
    <a href="tweetFeed" class="btn pink darken-1" id="border-style">Cancel</a>
</div>
@endsection
