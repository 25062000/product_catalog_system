@extends('layouts.app');
@section('content')
    <h1 class="text-center"> All Products </h1>
    <hr>
    <br>
    <div class="container">
        <div class="row">
            @foreach ($products as $product )
            <div class="col-lg-3" style="display:flex">

                <div class="card m-2 p-2" style="width: 18rem;">
                    <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <h5 class="card-title">Price: ${{ $product->price }}</h5>
                      <hr>
                      <p class="card-text">Available Quanitity {{ $product->available_quantity }}</p>
                      <p class="card-text">{{ $product->description }}</p>
                      <div class="container" style="display:flex">
                        <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-primary ">Details</a>

                        <form action="{{ route('admin.product.delete', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </form>

                    </div>

                    </div>
                  </div>


            </div>
            @endforeach
        </div>
    </div>
@endsection
