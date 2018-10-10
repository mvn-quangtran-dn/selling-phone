<?php

namespace App\Http\Controllers\Loginadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
    	return view('admin.loginadmin.login');
    }

    public function showLogin(Request $request)
    {
    	//dd(bcrypt('123123'));
        $email = $request['email'];
    	$password = $request['password'];
    	if (Auth::attempt(['email' => $email, 'password' => $password]) && Auth::user()->role_id == 1){
    		return redirect()->route('admin.index');
    	} else {
    		return redirect()->route('admin.login');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('admin.login');
    }
}
