<?php

namespace App\Http\Controllers\Loginuser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUser;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;

class LoginController extends Controller
{
    public function login()
    {
    	return view('content.loginuser.login');
    }

    public function showLogin(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];
        // dd(Auth::attempt(['email' => $email, 'password' => $password]));
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		return redirect()->route('home.index');
    	} else {
    		return redirect()->route('users.login');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('home.index');
    }

    public function register(){
        $role = Role::where('id', 2)->first();
        return view('content.loginuser.register', compact('role'));
    }

    public function showRegister(ManageUser $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect()->route('home.index');
    }
}
