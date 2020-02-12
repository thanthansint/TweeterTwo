@extends('layouts.app')

@section('content')
<div class="container  center-align">
    <form action="/createTweet" method="get">
        @csrf
        <p>Create New Tweet</p>
        <span>Content</span>
        {{-- <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" autofocus> --}}
        <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" autofocus>
            @error('content')
                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                </span>
            @enderror
        <input class="btn pink darken-1" type="submit" name="create" value="Create">
    </form>
    <br>
    <a class="btn pink darken-1" href="tweetFeed" id="tab1">Back</a>
</div>
@endsection
