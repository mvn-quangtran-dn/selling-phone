<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Order;
use App\Comment;
use App\Slide;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        $comments = Comment::where('active', '1')->get();
        return view('content.index', compact('slides', 'comments'));
    }

    public function product()
    {
    	return view('content.product');
    }

    public function contact()
    {
        return view('content.contact');
    }
}
