
<div id="user-login">
    {{-- <form action="signupForm" method="get">
        @csrf
        <input type="submit" name="signup" value="SignUp" id="button">
    </form> --}}
    <a href="/signupForm">Sign Up</a>
    <form action="/checkLogin" method="get">
        @csrf
        <p id="exist-user">For Existing Users</p>
        <p>Username</p>
        <input type="text" name="username" value="" autofocus>
        <p>Password</p>
        <input type="password" name="password" value="" ><br><br>
        <input type="submit" name="login" value="Login" id="button">
        <a href="#" id="forgotPassword">Forgot Password</a>
    </form>
</div>

