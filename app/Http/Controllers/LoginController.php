<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
     public function GetLogin()
    {
    	return view('login');
    }
    public function teacher()
    {
        $users = User::orderBy('username', 'asc')->get();

        return view('teacher', [
            'teacher' => $users
        ]);
    }

    public function student()
    {
        return view('student');
    }
   public function dangnhap(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'Teacher') {
                return redirect()->intended('teacher');
            } else {
                return redirect()->intended('student');
            }
        }
        return view('login')->withErrors(Hash::make('1234567'));
    }
}