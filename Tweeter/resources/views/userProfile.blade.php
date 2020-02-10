@extends('layouts.app')

@section('content')
    <p>Username : {{ $userProfile->name }}</p>
    <p>Email : {{ $userProfile->email }}</p>
    <p>Password : {{ $userProfile->password }}</p>

    <form action="/tweetFeed" method="get">
        @csrf
        <button type="submit" value="{{$userProfile->id}}">Back</button>
    </form>
@endsection
