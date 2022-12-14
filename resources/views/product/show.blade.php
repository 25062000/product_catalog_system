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
                        <a href="{{ route('home') }}" class="btn btn-success">Go Menu</a>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>


            {{-- //Next Column --}}

            <div class="col-md-4">
             <div class="container">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Enquiry
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $product->product_name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form action="{{ route('enquiry.store') }}" method="POST">
        @csrf
        <div class="modal-body">

            <div class="mb-3">
                <input type="hidden" class="form-control" name="product_id" id="product_id" value={{ $product->id }} >

            </div>

            <div class="mb-3">
                  <label for="enquiry" class="form-label">Enquiry</label>
                  <textarea type="message-text" name="enquiry" class="form-control" id="enquiry" ></textarea>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>
            </div>

            <div class="container mt-3">
                <h3>All Enquiries</h3>

                <div>
                    @foreach ($product->enquiries as $enquiry )
                        <div class="mb-2">
                            <p>Query sender</p>
                            <h5>{{ $enquiry->enquiry }}</h5>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>

    </div>
</div>
@endsection



