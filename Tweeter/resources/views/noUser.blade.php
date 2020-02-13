@extends('layouts.app')

@section('content')
    <div class="container center-align">
        <div class="row">
            <p>Sorry! There is no such user.</p>
        </div>
        <div class="row">
            <form action="/tweetFeed" method="get">
                @csrf
                <button class="btn pink darken-1" id="border-style" type="submit" value="">Back</button>
            </form>
        </div>

    </div>
@endsection
