@extends('layouts.app')

@section('content')
    <div class="container center-align">
        <div class="card-panel  light-green lighten-5" id="font-style">
            <p id="font-style">Username :{{$userProfile->name}}</p>
            <p id="font-style">Email :{{$userProfile->email}}</p>
        </div>
        <form action="/tweetFeed" method="get">
            @csrf
            <button class="btn pink darken-1" id="border-style" type="submit" value="{{$userProfile->id}}" autofocus>Back</button>
        </form>
    </div>
@endsection
