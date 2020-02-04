    <form action="userSignup" method="get">
        @csrf
        <p id="exist-user">For New Users</p>
        <span id="tab">Name</span>
        <input type="text" name="name" value="" autofocus><br><br>
        <span id="tab">Email</span>
        <input type="text" name="email" value=""><br><br>
        <span id="tab">Password</span>
        <input type="password" name="password" value=""><br><br>
        <p>Birthday</p>
        <input type="text" name="month" value="Month">
        <input type="text" name="day" value="Day" >
        <input type="text" name="year" value="Year" >
        <p>Gender</p>
        {{-- <label id="tab">Female --}}
            <input type="radio" checked="checked" name="female" value="Female">
            <span class="checkmark"></span>
        {{-- </label> --}}
        <label id="tab">Male
            <input type="radio" name="male">
            <span class="checkmark"></span>
        </label>
        <label id="tab">Other
            <input type="radio" name="other">
            <span class="checkmark"></span>
        </label>
        <p>Address</p>
        <span id="tab">City</span>
        <input type="text" name="city" value="" >
        <span id="tab">Country</span>
        <input type="text" name="country" value="" ><br><br>
        <input type="submit" name="signup" value="Sign Up" id="button">
    </form>
