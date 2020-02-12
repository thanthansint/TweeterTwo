<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    // public function homepage()
    // {
    //     return view('headerLayout');
    // }

    // public function checkLogin(Request $request){
    //     $username = $request->username;
    //     $password = $request->password;
    //     $result = \App\User::where('username', $username)
    //                     ->where ('password', $password)->get();
    //     if (sizeOf($result)==1) {
    //         return view('tweetFeed');
    //     }else {
    //         return view('loginFail');
    //     }
    // }
    // public function userSignup(Request $request) {
    //     $validatedData = $request->validate([
    //         'username' => 'required|max:255',
    //         // 'email'=>'required|email|unique:users,email',
    //         'email'=>'email:rfc,dns',
    //         'password'=>'required|max:255'
    //     ]);

    //     $username = $request->username;
    //     $email = $request->email;
    //     $password = $request->password;
    //     $birthday = $request->month.'/'.$request->day.'/'.$request->year;
    //     if ($request->female) {
    //         $gender = "female";
    //     } else if ($request->male){
    //         $gender = "male";
    //     } else {
    //         $gender = "other";
    //     }
    //     $address = $request->city.' '.$request->country;

    //     $user = new \App\User;
    //     $user->username = $username;
    //     $user->email = $email;
    //     $user->password = $password;
    //     $user->birthday = $birthday;
    //     $user->gender = $gender;
    //     $user->address = $address;
    //     $user->save();
    //     return view('headerLayout');
    // }
    public function userProfile() {
        return view('userProfile');
    }
    public function showUserProfile(Request $request){
        if (Auth::check()){
            $userProfile = \App\User::find(Auth::user()->id);
            return view('userProfile', ['userProfile'=>$userProfile]);
        } else {
            return view('tweetFeed');
        }
    }
    public function editUserProfileForm(Request $request) {
        return view('editUserProfileForm',['userId'=>Auth::user()->id]);
    }
    public function editUserProfile(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $newuser = \App\User::find(Auth::user()->id);
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->save();

        $result = \App\Tweet::all();
        return view('tweetFeed',['tweets'=>$result]);
    }
    public function deleteUserProfileForm(Request $request) {
        return view('deleteUserProfileForm',['userId'=>Auth::user()->id]);
    }
    public function deleteUserProfile(Request $request){
        if (isset($request->yes)) {
            $result = \App\Tweet::where('user_id', Auth::user()->id)->get();
            if (sizeOf($result)>0) {
                foreach ($result as $r) {
                    \App\Tweet::destroy($r->id);
                }
            }
            $results = \App\Like::where('user_id', Auth::user()->id)->get();
            if (sizeOf($results)>0) {
                foreach ($results as $r) {
                    \App\Like::destroy($r->id);
                }
            }
            $result1 = \App\FollowRelationship::where('user_id', Auth::user()->id)->get();
            if (sizeOf($result1)>0) {
                foreach ($result1 as $r) {
                    \App\FollowRelationship::destroy($r->id);
                }
            }
            $result2 = \App\Comment::where('user_id', Auth::user()->id)->get();
            if (sizeOf($result2)>0) {
                foreach ($result2 as $r) {
                    \App\Comment::destroy($r->id);
                }
            }
            \App\User::destroy(Auth::user()->id);
            return view('welcome');
        } else {
            $result = \App\Tweet::all();
            return view('tweetFeed',['tweets'=>$result]);
        }
    }
}
