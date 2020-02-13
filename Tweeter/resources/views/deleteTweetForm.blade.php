@extends('layouts.app')
@section('content')
<div class="container  center-align">
    <form action="/deleteTweet" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$tweet->id}}">
        <p>Are you sure to delete?</p>
        <button class="btn pink darken-1" id="border-style" type="submit" name ="yes" value="{{$tweet->id}}">Yes</button>
        <button class="btn pink darken-1" id="border-style" type="submit" name ="no" value="{{$tweet->id}}">No</button>
    </form>
</div>
@endsection
