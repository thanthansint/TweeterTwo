@extends('layouts.app')

@section('content')
    @foreach ($userProfile as $user}}</p>
        <p>{{ $user->username }}</p>
        <p>{{ $user->email }}</p>
        <p>{{ $user->birthday }}</p>
        <p>{{ $user->gender }}</p>
        <p>{{ $user->address }}</p>
    @endforeach

<form action="/editUserProfileForm" method="post">
    @csrf
    <input type="hidden" name="userId" value="{{$user->id}}">
    <button type="submit" value="{{$user->id}}">Edit Profile</button>
</form>
<form action="/deleteUserProfile" method="post">
    @csrf
    <input type="hidden" name="userId" value="{{$user->id}}">
    <button type="submit" value="{{$user->id}}">Delete Profile</button>
</form>
@endsection
