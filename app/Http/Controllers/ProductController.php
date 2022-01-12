<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(){
      $data = Product::get()->toArray();
        return view('product.create-product', compact('data'));
    }
    public function saveProduct(Request $request){

        $data = new Product();
        $data->product_name = $request->input('product_name');
        $data->product_quantity = $request->input('product_quantity');
        $data->product_price = $request->input('product_price');

        $data->save();
        return redirect('product');
    }
    public function deleteProduct($id){
        Product::where('id', $id)->delete();
        return redirect('product');
    }
    public function editProduct($id){
        $edit = Product::where('id', $id)->first();
        return view('product.edit-product', compact('edit'));
    }
    public function updateProduct(Request $request){
        dd($request->toArray());
        $data = Product::where('id', $request->input('id'))->first();
        $data->product_name = $request->input('product_name');
        $data->product_quantity = $request->input('product_quantity');
        $data->product_price = $request->input('product_price');

        $data->save();
        return redirect('product');
    }
}
