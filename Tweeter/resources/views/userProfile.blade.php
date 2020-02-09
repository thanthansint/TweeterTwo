@extends('layouts.app')

@section('content')

    <p>{{ $userProfile->name }}</p>
    <p>{{ $userProfile->email }}</p>
    <p>{{ $userProfile->password }}</p>

    <form action="/editUserProfileForm" method="post">
        @csrf
        <input type="hidden" name="userId" value="{{$userProfile->id}}">
        <button type="submit" value="{{$userProfile->id}}">Edit Profile</button>
    </form>
    <form action="/deleteUserProfile" method="post">
        @csrf
        <input type="hidden" name="userId" value="{{$userProfile->id}}">
        <button type="submit" value="{{$userProfile->id}}">Delete Profile</button>
    </form>
@endsection
