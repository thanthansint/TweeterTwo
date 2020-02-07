
<form action="/createTweet" method="get">
    @csrf
    <p>Create New Tweet</p>
    <span>Content</span>
    <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="" autofocus>
        @error('content')
            <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
            </span>
        @enderror
    <input type="submit" name="create" value="Create">
</form>
