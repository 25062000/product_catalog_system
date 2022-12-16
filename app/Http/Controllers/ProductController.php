<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'price' => 'required',
            'user_email' =>'required'
        ]);

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        $product = new Product();
        $product->product_name = $data['product_name'];
        $product->user_email = $data['user_email'];
        $product->picture = $data['picture'];
        $product->description = $data['description'];
        $product->available_quantity = $data['available_quantity'];
        $product->price = $data['price'];
        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'price' => 'required',
            'user_email' =>'required'
        ]);

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }


        $product = Product::find($id);
        $product->product_name = $data['product_name'];
        $product->user_email = $data['user_email'];
        $product->picture = $data['picture'];
        $product->description = $data['description'];
        $product->available_quantity = $data['available_quantity'];
        $product->price = $data['price'];
        $product->save();

        return redirect('/myproducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Product::find($id)->delete();
       return redirect('/myproducts');
    }

    public function myproduct(){
        $productemail = Auth::user()->email;

        $myproducts = Product::where('user_email', $productemail)->get();
   
        return view('product.myproducts')->with('myproducts', $myproducts);
    }

    public function myproductdetail($id){
        $product = Product::find($id);
        return view('product.myproductsdetail')->with('product', $product);
    }
}
