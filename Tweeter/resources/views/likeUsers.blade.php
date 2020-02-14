@extends('layouts.app')
@php
    function checkLikeUser($userToCheck, $likeUsers){
        foreach ($likeUsers as $likeUser) {
            if ($userToCheck == $likeUser->tweet_id){
                return true;
            }
        }
        return false;
    }
@endphp
@section('content')
    @foreach ($tweets as $tweet)
        @if (checkLikeUser($tweet->id, $likeUsers))
            <form action="/unlikeUsers" method="get">
                @csrf
            <input type="hidden" name="id" value="{{$tweet->tweet_id}}">
            <input class="btn pink darken-1" id="border-style" type="submit" value="Unlike">
        @else
            <form action="/saveLike" method="post">
                @csrf
            <input type="hidden" name="id" value="{{$tweet->tweet_id}}">
            <input class="btn pink darken-1" id="border-style" type="submit" value="like">
            </form>
        @endif
    @endforeach
@endsection
