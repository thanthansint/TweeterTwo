{{-- @extends('masterUser')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" >
    <title>User Home</title>
</head>
<body>
    <header id="userHeader">
        <h1>Welcome To Tweeter</h1>
    </header>
    <a href="#" id="tab1">Create Tweet</a>
    <a href="#" id="tab1">User's Profile</a><br><br>
    <div>
        <span id="search">Search</span>
        <input type="text" name="search" id="search">
    </div>
</body>
</html>


{{-- @endsection --}}
