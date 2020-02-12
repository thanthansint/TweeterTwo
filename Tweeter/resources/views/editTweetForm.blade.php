@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <form action="/editTweet" method="post">
            @csrf
            <p>Edit Tweet</p>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{$tweet->content}}">
            @error('content')
                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                </span>
            @enderror
            <input type="hidden" name="id" value="{{$tweet->id}}">
            <input class="btn pink darken-1" type="submit" name="edit" value="Edit">
        </form>
        <br>
        <a class="btn pink darken-1" href="tweetFeed" id="tab1">Back</a>
    </div>
@endsection
