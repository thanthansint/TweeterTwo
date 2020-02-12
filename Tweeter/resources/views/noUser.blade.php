@extends('layouts.app')

@section('content')
    <div class="container center-align">
        <div class="row">
            <p>Sorry! There is no such user.</p>
        </div>
        <div class="row">
            <form action="/tweetFeed" method="get">
                @csrf
                <button class="btn-flat waves-effect waves-yellow grey-text text-darken-4" type="submit" value="">Back</button>
            </form>
        </div>

    </div>
@endsection
