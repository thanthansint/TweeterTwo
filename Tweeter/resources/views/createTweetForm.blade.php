
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
