@extends('masterUser')
@section('content')

    @guest
        <p>Go Sign Up!</p>
    @else
        <p id="welcome">Welcome {{Auth::user()->name}}</p>

        @foreach ($tweets as $tweet)
            <p><strong>{{$tweet->author}}</strong></p>
            <p>{{$tweet->content}}</p>
            <p>{{$tweet->created_at}}</p>
            @if (Auth::user()->name == $tweet->author)
                <form action="/editTweetForm" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$tweet->id}}">
                    <button type="submit" value="{{$tweet->id}}">Edit</button>
                </form>
                <form action="/deleteTweet" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$tweet->id}}">
                    <button type="submit" value="{{$tweet->id}}">Delete</button>
                </form>
            @endif
        @endforeach


        <form action="/createTweet" method="get">
            @csrf
            <p>Create New Tweet</p>
            <p>Content</p>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" autofocus>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                    </span>
                @enderror
            <p>Author</p>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="" autofocus>
                @error('author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            <input type="submit" name="create" value="Create">
        </form>

    @endguest

@endsection

