@extends('layouts.app')
@section('content')
    <div class="container  center-align">
        <form action="/deleteUserProfile" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$userId}}">
            <p id="font-style">Are you sure to delete?</p>
            <button class="btn pink darken-1" id="border-style" type="submit" name ="yes" value="{{$userId}}">Yes</button>
            <button class="btn pink darken-1" id="border-style" type="submit" name ="no" value="{{$userId}}">No</button>
        </form>
    </div>
@endsection
