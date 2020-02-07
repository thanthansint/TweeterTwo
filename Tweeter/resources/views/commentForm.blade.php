@extends('layouts.app')

@section('content')

<form action="/editComment" method="post">
    @csrf
    <input type="hidden" name="tweetId" value="{{$tweet}}">
    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
    <input type="hidden" name="commentId" value="{{$commentId}}">
    <span>Comment</span>
    <input type="text" name="content" value="">
    <input type="submit" name="submit" value="-->">
</form>
@endsection
