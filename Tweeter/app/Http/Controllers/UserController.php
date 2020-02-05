<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function homepage()
    {
        return view('headerLayout');
    }

    public function checkLogin(Request $request){
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
    public function userSignup(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            // 'email'=>'required|email|unique:users,email',
            'email'=>'email:rfc,dns',
            'password'=>'required|max:255'
        ]);

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $birthday = $request->month.'/'.$request->day.'/'.$request->year;
        if ($request->female) {
            $gender = "female";
        } else if ($request->male){
            $gender = "male";
        } else {
            $gender = "other";
        }
        $address = $request->city.' '.$request->country;

        $user = new \App\User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->birthday = $birthday;
        $user->gender = $gender;
        $user->address = $address;
        $user->save();
        return view('headerLayout');
    }
}
