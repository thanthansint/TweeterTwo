@extends('layouts.app')

@section('content')
    <div class="container  center-align"  id="margin">
        <form action="/editComment" method="post">
            @csrf
            <input type="hidden" name="tweetId" value="{{$tweet}}">
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <input type="hidden" name="commentId" value="{{$commentId}}">
            <label>Comment</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" required autocomplete="content">
            @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            <input class="btn pink darken-1" id="border-style" type="submit" name="submit" value="-->">
        </form>
        <br>
        <a class="btn pink darken-1" id="border-style" href="tweetFeed">Back</a>
    </div>
@endsection
