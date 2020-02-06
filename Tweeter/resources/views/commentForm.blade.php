<form action="/editComment" method="post">
    @csrf
    <input type="hidden" name="tweetId" value="{{$tweet->id}}">
    <input type="hidden" name="userId" value="{{$user->id}}">
    <span>Comment</span>
    <input type="text" name="comment" value="">
    <input type="submit" name="submit" value="-->">
</form>
