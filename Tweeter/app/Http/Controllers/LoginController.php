<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function homepage()
    {
        return view('headerLayout');
    }
    function checkLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        $result = \App\User::where('username', $username)
                        ->where ('password', $password)->get();
        if (sizeOf($result)==1) {
            return view('tweetFeed');
        }else {
            return view('loginFail');
        }
    }
    function userSignup(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $birthday = $request->month.'/'.$request->day.'/'.$request->year;
        if ($request->female)
        $gender = $request->gender;
    }
    function signupFrom(){
        return view('signupForm');
    }

}
