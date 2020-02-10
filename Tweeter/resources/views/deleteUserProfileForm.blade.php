@extends('layouts.app')
@section('content')
    <form action="/deleteUserProfile" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$userId}}">
        <p>Are you sure to delete?</p>
        <button type="submit" name ="yes" value="{{$userId}}">Yes</button>
        <button type="submit" name ="no" value="{{$userId}}">No</button>
    </form>

@endsection
