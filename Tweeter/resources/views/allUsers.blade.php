@extends('layouts.app')

@php
    function checkFollowing($userToCheck, $follows){
        foreach ($follows as $follow) {
            if ($userToCheck == $follow->followed){
                return true;
            }
        }
        return false;
    }
@endphp

@section('content')
    @foreach ($users as $user)
        <p><strong>{{$user->name}}</strong></p>
        @if (checkFollowing($user->name, $follows))
            <p>Already Following!</p>
        @else
            <form action="/followUser" method="post">
                @csrf
                <input type="submit" value="Follow">
            </form>
        @endif

    @endforeach
@endsection
