@extends('layouts.app')

@section('content')
    <form action="user" method="get">
        <p class="username">Username</p>
        <input type="text" name="username" value="" autofocus>
        <p>Password</p>
        <input type="password" name="password" value="Password">
        <input type="submit" name="login" value="Login">
    </form>
@endsection
