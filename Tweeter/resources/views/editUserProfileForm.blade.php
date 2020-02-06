form action="/editUserProfile" method="post">
    @csrf

    <span id="tab">Name</span>
    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="text" autofocus><br><br>
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <span id="tab">Email</span>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="text"><br><br>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <span id="tab">Password</span>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="text"><br><br>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <p>Birthday</p>
    <div>
    <input type="text" name="month" value="Month" id="text">
    <input type="text" name="day" value="Day" id="text">
    <input type="text" name="year" value="Year" id="text">
    </div>
    <p>Gender</p>
    <input type="radio" name="gender" value="female" checked>Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <p>Address</p>
    <span id="tab">City</span>
    <input type="text" name="city" id="text">
    <span id="tab">Country</span>
    <input type="text" name="country" id="text"><br><br>
    <input type="submit" name="edit" value="Edit Profile" id="button">
</form>
