@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <form action="/editTweet" method="post">
            @csrf
            <p id="font-style">Edit Tweet</p>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{$tweet->content}}" autofocus required autocomplete="content">
            @error('content')
                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                </span>
            @enderror
            <input type="hidden" name="id" value="{{$tweet->id}}">
            {{-- //////// --}}
            <input type="hidden" name="url" value="{{$url}}">
            <input class="btn pink darken-1" id="border-style" type="submit" name="edit" value="Edit">
        </form>
        <br>
        <a class="btn pink darken-1" id="border-style" href="tweetFeed" id="tab1">Back</a>
    </div>
@endsection
