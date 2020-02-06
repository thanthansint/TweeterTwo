<form action="/tweetFeed" method="post">
    @csrf
    <p>Edit Tweet</p>
    <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="Content">
    @error('content')
        <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
        </span>
    @enderror
    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="Author">
    @error('author')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <input type="hidden" name="id" value="{{$tweet->id}}">
    <input type="submit" name="edit" value="Edit">
</form>
