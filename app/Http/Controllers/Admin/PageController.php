<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    { 
    	return view('layouts.admin');
    }

    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}
