
<div id="grid">
    <div id="user-login">
    <form action="userLogin" method="get">
        @csrf
        <p id="exist-user">For Existing Users</p>
        <p>Username</p>
        <input type="text" name="username" value="" autofocus>
        <p>Password</p>
        <input type="password" name="password" value="" ><br><br>
        <input type="submit" name="login" value="Login" id="button">
    </form>
    </div>
    <div>
        <form action="userSignup" method="get">
            @csrf
            <p id="exist-user">For New Users</p>
            <span id="tab">Firstname</span>
            <input type="text" name="firstname" value="" autofocus><br><br>
            <span id="tab">Lastname</span>
            <input type="text" name="lastname" value=""><br><br>
            <span id="tab">Email</span>
            <input type="text" name="email" value=""><br><br>
            <span id="tab">Password</span>
            <input type="password" name="password" value=""><br><br>
            <p>Birthday</p>
            <input type="text" name="month" value="Month">
            <input type="text" name="day" value="Day" >
            <input type="text" name="year" value="Year" >
            <p>Gender</p>
            <label id="tab">Female
                <input type="radio" checked="checked" name="female">
                <span class="checkmark"></span>
            </label>
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
    </div>
</div>
