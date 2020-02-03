<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function homepage()
    {
        return view('headerLayout');
    }
    public function login()
    {
        return view('login');
    }

}
