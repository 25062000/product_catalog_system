@extends('layouts.app')
@section('content')

    <h1 class="text-center mb-3">{{ $product->product_name }}</h1>
    <hr>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-8" style="display:flex">
                <div class="container m-2 p-2">
                    <img src="/images/{{ $product->picture }}" height="350px" alt="...">
                    <div class="container m-2 p-2">
                        <h2>Price: {{ $product->price }}</h2>
                        <h5>Available Quantity: {{ $product->available_quantity }}</h5>
                        <p>{{ $product->description }}</p>
                        <a href="{{ route('product.myproducts') }}" class="btn btn-primary">My products</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>



    </div>
</div>


<div class="container">
    <h3>All Enquiries</h3>

    <div>
        @foreach ($product->enquiries as $enquiry )
            <div class="mb-2">
                <p>{{ $enquiry->user_email }}</p>
                <h5>{{ $enquiry->enquiry }}</h5>
                <hr>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection



