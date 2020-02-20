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
                        <div class="col s6 m6 l6"><br>
                            <p><strong>{{$user->name}}</strong></p>
                        </div>

                        @if (checkFollowing($user->id, $follows))
                        <br><br>
                            <div class="col s6 m6 l6">
                                <form action="/unfollowUsers" method="get">
                                    @csrf
                                <input type="hidden" name="unfollowedUserId" value="{{$user->id}}">
                                <input class="btn pink darken-1" id="border-style" type="submit" value="Unfollow">
                                </form>
                            </div>
                            <div class="col s12">
                                <p>Already Following!</p><br>
                            </div>
                        @else
                            <div class="col s6 m6 l6">
                                <br><br>
                                <form action="/followUsers" method="post">
                                    @csrf
                                <input type="hidden" name="followedUserId" value="{{$user->id}}">
                                <input class="btn pink darken-1" id="border-style" type="submit" value="Follow"> <br> <br>
                                </form>
                            </div>
                        @endif
                    </div>
                <div class="divider"></div>
            @endforeach
        </div>
        <br>
        <a class="btn pink darken-1" id="border-style" href="tweetFeed">Back</a> <br> <br>
    </div>
@endsection
