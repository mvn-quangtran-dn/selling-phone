<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
class OrderController extends Controller
{
    public function create_order(Request $request)
    {
    	$id = $request->get('id');
    	if ($id != null) {
    		$product = Product::find($id);
    		$data = [
    			"name" => $product->name,
    			"price" => $product->price
    		];
    	echo json_encode($data);
    	}
    }
}
