<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        //dd($products);
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::where('parent_id', '!=', "0")->get();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $data = [
            "name" => $request->get('name'),
            "quantity" => $request->get('quantity'),
            "cpu" => $request->get('cpu'),
            "screen" => $request->get('screen'),
            "system" => $request->get('system'),
            "bcamera" => $request->get('bcamera'),
            "fcamera" => $request->get('fcamera'),
            "ram" => $request->get('ram'),
            "rom" => $request->get('rom'),
            "smenory" => $request->get("smemory"),
            "pin" => $request->get('pin'),
            "price" => $request->get('price'),
            "category_id" => $request->get('category_id'),
            "description" => $request->get('description'),
            "code_product" => date('d').date('m').date('Y').$request->get('name')
        ];
        $product = Product::create($data);
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = date('d-m-Y').$image->getClientOriginalName();
                $path = 'image';
                $image->move($path, $image_name);
                $data = [
                    'name' => $path.'/'.$image_name,
                    'product_id' => $product->id
                ];
                Image::create($data);
            }
        }

        return redirect()->route('products.index');
    }
    public function show(Product $product) {
        return view('admin.products.show', compact('product'));
    }
    public  function edit(Product $product) {
        $categories = Category::where('parent_id', '!=', "0")->get();
        $images = Image::get();
        return view('admin.products.edit', compact('product', 'categories', 'images'));
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
    public function update(Product $product, Request $request){
        $data = $request->all();
        $product->update($data);
        return redirect()->route('products.index');
    }

}
