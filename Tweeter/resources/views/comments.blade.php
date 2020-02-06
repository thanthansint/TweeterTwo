@foreach ($comments as $comment)
    <p> {{ $comment->content }}</p><br>
    @if ($user->id == $comment->user_id)
        <form action="/commentForm" method="post">
            @csrf
            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
            <input type="hidden" name="userId" value="{{$user->id}}">
            <button type="submit" value="{{$comment->id}}">Edit Comment</button>
        </form>
        <form action="/deleteComment" method="post">
            @csrf
            <input type="hidden" name="tweetId" value="{{$tweet->id}}">
            <input type="hidden" name="userId" value="{{$user->id}}">
            <button type="submit" value="{{$comment->id}}">Delete Comment</button>
        </form>
    @endif
@endforeach
