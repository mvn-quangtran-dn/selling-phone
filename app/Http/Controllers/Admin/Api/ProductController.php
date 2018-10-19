<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        echo json_encode($products);
    }
    // show tất cả product
    public function showproduct()
    {
    	$products = Product::get();
    	echo json_encode($products);
    }
    public function search(Request $request)
    {
    	$query = $request->get('query');
    	if ($query != '') {
    		$products = Product::with('category', 'images')
                                ->where('name', 'like', "%$query%")
    							->orwhere('price', 'like', "%$query%")
    							->orwhere('system', 'like', "%$query%")
    							->get();
    	} else {
    		$products = Product::with('category', 'images')->orderBy('id', 'desc')->get();
    	}
        $total_product = $products->count();
        if ($total_product > 0) {
            foreach ($products as  $product) {
                $nameimage = "";
                foreach ($product->images as $key => $image) {
                    $nameimage = $image->name;
                }
                $output[] = 
                    '<tr>
                        <td>'."<img src=\""."../".$nameimage."\" with=\"50px\" height=\"50px\">".'</td>
                        <td>'."<a href=\"products"."/".$product->id."\">".$product->name.'</a>'.'</td>
                        <td>'.$product->quantity.'</td>
                        <td>'.$product->price.'</td>
                        <td id="category">'.$product->category->name.'</td>
                        <td>'."<a href=\"products"."/".$product->id."/edit"."\" class=\"btn btn-info\">".'<i class="ace-icon fa fa-pencil bigger-120"></i>'.'</a>'
                            ."<button class=\"btn btn-danger\" title=\"Xóa sản phẩm\" data-id=\"".$product->id."\" id=\"delete".$key."\">".
                            "<i class=\"fa fa-trash-o\">".'</i>'.'</button>'
                        .'</td>
                    </tr>';

            }
        } else {
            $output = "Không thể tìm thấy sản phẩm trong dữ liệu";
        }
        $data = [
            'table_product' => $output,
            'table_row' => $total_product
        ];
        echo json_encode($data);
    	//return response()->json($products, 200);
        //$request->session()->flash('test','123');
    }
    public function remote(Request $request)
    {
        $product = Product::find($request->id);
        Image::where("product_id", $product->id)->delete();
        if ($product->delete()) {
            $data = "da xoa thanh cong";
        } else {
            $data = "xoa that bai";
        }
        echo json_encode($data);
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
}
