@extends('layouts.app')
@section('content')
    <form action="/deleteTweet" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$tweet->id}}">
        <p>Are you sure to delete?</p>
        <button type="submit" name ="yes" value="{{$tweet->id}}">Yes</button>
        <button type="submit" name ="no" value="{{$tweet->id}}">No</button>
    </form>

@endsection
