@extends('layouts.app')

@section('content')
    <div class="container center-align">
        <div class="card-panel  light-green lighten-5" id="fontStyle">
            <p >Username :{{$userProfile->name}}</p>
            <p >Email :{{$userProfile->email}}</p>
            <p >Password :{{$userProfile->password}}</p>
        </div>
        <form action="/tweetFeed" method="get">
            @csrf
            <button class="btn blue-grey darken-2" id="borderStyle" type="submit" value="{{$userProfile->id}}">Back</button>
        </form>
    </div>
@endsection
