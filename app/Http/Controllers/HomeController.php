<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Order;
use App\Comment;

use App\Slide;

use Cart;


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

        $categories = Category::where('parent_id', '=', 1)->get();
        $new_products = Product::with('images')->orderBy('id','desc')->paginate(4);
        return view('content.index', compact('categories', 'new_products'));

    }

    public function product($id)
    {
        $product = Product::with('images')->find($id);
        $categories = Category::where('parent_id', '=', 1)->get();
        return view('content.product', compact('product','categories'));
    }
    public function showAllProduct()
    {
        $products = Product::orderBy('id','desc')->paginate(12);
        $categories = Category::where('parent_id', '=', 1)->get();
        return view('content.showproduct', compact('categories', 'products'));
    }
    public function autocomplete(Request $request)
    {
        if ($request->get('query')) 
        {
            $query =  $request->get('query');
            $products = Product::where('name', 'like', '%'.$query.'%')->get();
        } 
        echo json_encode($products);
    }
    public function checkorder()
    {
        $cart = Cart::content();
        return view('content.order', compact('cart'));
    }

    public function contact()
    {
        return view('content.contact');
    }
}
