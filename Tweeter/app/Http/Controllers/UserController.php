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
    public function userProfile() {
        return view('userProfile');
    }
    public function showUserProfile(Request $request){
        $userProfile = \App\User::find($request->id);
        return view('userProfile', ['userProfile'=>$userProfile]);
    }
    public function editUserProfileForm() {
        return view('editUserProfileForm');
    }
    public function editUserProfile(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email'=>'email:rfc,dns',
            'password'=>'required|max:255'
        ]);

        $newuser = \App\User::find($request->userId);
        $newuser->username = $request->username;
        $newuser->email = $request->email;
        $newuser->password = $request->password;
        $newuser->birthday = $request->month.'/'.$request->day.'/'.$request->year;
        if ($request->female) {
            $newuser->gender = "female";
        } else if ($request->male){
            $newuser->gender = "male";
        } else {
            $newuser->gender = "other";
        }
        $newuser->username = $request->city.' '.$request->country;
        $newuser->save();

        return view('tweetFeed');
    }

    public function deleteUserProfile(Request $request){
        \App\User::destroy($request->userId);
         return view('tweetFeed');
    }

}
