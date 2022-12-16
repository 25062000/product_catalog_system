@extends('layouts.app');
@section('content')
    <h1 class="text-center"> My Products </h1>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            {{-- @empty($myproducts) --}}
            @foreach ($myproducts as $product )
            <div class="col-lg-3" style="display:flex">

                <div class="card m-2 p-2" style="width: 18rem;">
                    <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <h5 class="card-title">Price: ${{ $product->price }}</h5>
                      <hr>
                      <p class="card-text">Available Quanitity {{ $product->available_quantity }}</p>
                      {{-- <p class="card-text">{{ $product->description }}</p> --}}
                      <div class="container " style="display:flex">
                        <a href="{{ route('myproduct.myproductdetail', $product->id) }}" class="btn btn-primary">Details </a>
                        {{-- <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success ms-5">Edit</a> --}}
                        <form action="{{ route('myproduct.delete', $product->id)  }}" method="POST" style="margin-bottom: 0px" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3 ">Delete</button>
                        </form>
                    </div>


                    </div>
                  </div>


            </div>
            @endforeach
            {{-- @else
            <div class="container justify-content-center align-items-center">
                <h5 class="text-center">You haven't add products yet</h5>
                <h5 class="text-center">To add products, Click Add Product</h5>
                <a href="{{ route('product.create') }}" type="button" class="btn btn-primary ">Add Product</a>
            </div> --}}
            {{-- @endempty --}}
        </div>
    </div>
@endsection


