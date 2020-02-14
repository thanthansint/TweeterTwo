@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
        <form class="col s12 m12 l12" action="/editUserProfile" method="post">
            @csrf
            <div class="row input-field">
                <i class="material-icons prefix">account_circle</i>
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  autofocus required autocomplete="name"><br><br>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row input-field">
                <i class="material-icons prefix">mail_outline</i>
                <label>Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email"><br><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row center">
                <input type="hidden" name="userId" value="{{$userId}}">
                <button class="btn pink darken-1" id="border-style" type="submit" name="edit"><i class="material-icons">update</i>Edit</button>
            </div>
        </form>
        <div class="row center">
            <form action="/tweetFeed" method="get">
                <input type="hidden" name="userId" value="{{$userId}}">
                <button class="btn pink darken-1" id="border-style" type="submit" name="cancel"><i class="material-icons">close</i>Cancel</button>
            </form>
        </div>
    </div>
@endsection
