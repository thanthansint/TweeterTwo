@extends('layouts.app')

@php
    function checkFollowing($userToCheck, $follows){
        foreach ($follows as $follow) {
            if ($userToCheck == $follow->followedUser_id){
                return true;
            }
        }
        return false;
    }
@endphp

@section('content')
    <p id="font-style" class="center-align">Follow Users</p>
    <div class="container  center-align">
        <div class="card-panel">
            @foreach ($users as $user)
                <div class="divider"></div>
                <div class="row col s12">
                    <div class="col s4">
                        <p><strong>{{$user->name}}</strong></p>
                    </div>
                    <div class="col s8">
                        @if (checkFollowing($user->id, $follows))
                        <br>
                            <div class="col s4">
                                <form action="/unfollowUsers" method="get">
                                    @csrf
                                <input type="hidden" name="unfollowedUserId" value="{{$user->id}}">
                                <input class="btn pink darken-1" id="border-style" type="submit" value="Unfollow">
                                </form>
                            </div>
                            <div class="col s4">
                                <p>Already Following!</p>
                            </div>
                        @else
                            <div class="col s4">
                                <br>
                                <form action="/followUsers" method="post">
                                    @csrf
                                <input type="hidden" name="followedUserId" value="{{$user->id}}">
                                <input class="btn pink darken-1" id="border-style" type="submit" value="Follow">
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="divider"></div>
            @endforeach
        </div>
        <br>
        <a class="btn pink darken-1" id="border-style" href="tweetFeed">Back</a>
    </div>
@endsection
