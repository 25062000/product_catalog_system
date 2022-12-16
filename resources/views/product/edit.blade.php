@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="">Edit Product</h1>
        <hr>

        <form action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
              <label for="product_name" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="product_name" name="product_name" value={{ $product->product_name }}>
            </div>

            <div class="mb-3">
                {{-- <label for="user_email" class="form-label">user_email</label> --}}
                <input type="hidden" class="form-control" id="user_email" name="user_email" value="{{ Auth::user()->email  }}">
              </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Choose Picture</label>
                <input type="file" class="form-control" name="picture" id="picture" value="">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description"  name="description" value={{ $product->description }}>
            </div>

            <div class="mb-3">
                <label for="available_quantity" class="form-label">Available Quantity</label>
                <input type="text" class="form-control" id="available_quantity"  name="available_quantity" value={{ $product->available_quantity }}>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price"  name="price" value={{ $product->price }}>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
@endsection


