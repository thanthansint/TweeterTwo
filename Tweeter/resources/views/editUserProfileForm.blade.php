@extends('layouts.app')

@section('content')

<form action="/editUserProfile" method="post">
    @csrf
    <span id="tab">Name</span>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="text" autofocus><br><br>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <span id="tab">Email</span>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="text"><br><br>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <span id="tab">Password</span>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="text"><br><br>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <input type="submit" name="edit" value="Edit Profile">
</form>
@endsection
