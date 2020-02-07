@extends('layouts.app')

@section('content')
    @foreach ($follows as $follow)
        <p>{{ $follow->name}}</p>
    @endforeach
    <a href="tweetFeed" id="tab1">Back</a>
@endsection
