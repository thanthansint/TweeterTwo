@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <form class="col s12 m12 l12" action="/createTweet" method="get">
        <p class="center-align" id="font-style">Create New Tweet</p>
        <div class="input-feild center-align">
            @csrf
            <label>Content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" autofocus>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
        <div class="row s12 m12 l12">
            <div class="col s12 m6 l6 center-align">
                <br>
                <input class="btn pink darken-1" type="submit" name="create" value="Create">
            </div>
            <div class="col s12 m6 l6 center-align">
                <br>
                <a class="btn pink darken-1" href="tweetFeed" id="tab1">Back</a>
            </div>
        </div>
    </form>

</div>
@endsection
