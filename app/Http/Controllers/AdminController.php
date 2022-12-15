<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function adminViewProducts(){
    $products = Product::all();
    return view('admin.index')->with('products', $products);

   }

   public function deleteProduct($id){
      Product::find($id)->delete();
      return redirect('/admin/products');

   }

   public function show($id){
    $product=Product::find($id);
    return view('admin.show')->with('product',$product);
   }
}
