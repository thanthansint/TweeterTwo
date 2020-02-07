@foreach ($comments as $comment)
    <p> {{ $comment->content }}</p><br>
    @if (Auth::user()->id == $comment->user_id)
<form action="/commentForm" method="post">
            @csrf
            <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <button type="submit" name="commentId" value="{{$comment->id}}">Edit Comment</button>
        </form>
        <form action="/deleteComment" method="post">
            @csrf
            <input type="hidden" name="tweetId" value="{{$comment->tweet_id}}">
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
            <button type="submit" name="commentId" value="{{$comment->id}}">Delete Comment</button>
        </form>
    @endif
@endforeach
