<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Image;
use App\Http\Requests\ProductValidate;
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
    public function store(ProductValidate $request) //ProductValidate
    {
        $dataProducts = $request->all();        
        $dataProducts["code_product"] = date('d').date('m').date('Y').$request->get('name');        
        //dd($dataProducts);
        $product = Product::create($dataProducts);
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = date('d-m-Y').$image->getClientOriginalName();
                $path = 'image';
                $image->move($path, $image_name);
                $dataImg = [
                    'name' => $path.'/'.$image_name,
                    'product_id' => $product->id
                ];
                Image::create($dataImg);
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
    public function destroy(CategoryValidate $product){
        $product->delete();
        return redirect()->route('products.index');
    }
    public function update(Product $product, ProductValidate $request){
        $data = $request->all();
        $product->update($data);
        $dataImg = $request->get('images');
        //Image::update($dataImg);
        return redirect()->route('products.index');
    }

}
