@extends('layouts.app')

@section('content')
    @foreach ($followingUsers as $follow)
    @php print_r($follow);@endphp
        {{-- <p>{{ $follow->name}}</p> --}}
    @endforeach
    <a href="tweetFeed" id="tab1">Back</a>
@endsection
