@extends('layouts.app')

@section('content')
    <div class="container  center-align">
        <div class="row">
            <form class="col s12" action="/editUserProfile" method="post">
                @csrf
                <div class="row">
                    <span id="tab">Name</span>
                    <input type="text" name="name" value="{{Auth::user()->name}}" autofocus><br><br>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <span id="tab">Email</span>
                    <input type="text" name="email" value="{{Auth::user()->email}}"><br><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input type="hidden" name="userId" value="{{$userId}}">
                    <input class="btn pink darken-1" type="submit" name="edit" value="Edit">
                </div>
            </form>
        </div>
        <form action="/tweetFeed" method="get">
            <input type="hidden" name="userId" value="{{$userId}}">
            <input class="btn pink darken-1" type="submit" name="cancel" value="Cancel">
        </form>
    </div>
@endsection
