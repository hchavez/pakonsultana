@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
        </div>
        <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                      <h6 class="m-0 font-weight-bold ">Edit {{ $product['product_name'] }}</h6> <br>
                        <form method="POST" action="{{ route('product-edit') }}">
                        @csrf
                        
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                       
                       <input value="{{ $product['id'] }}" type="hidden" name="id">
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input id="product_name" value="{{ $product['product_name'] }}" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Product Description</label>
                            <input id="description" value="{{ $product['description'] }}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input id="price" value="{{ $product['price'] }}" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required  autofocus>
                        </div>   

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                        
                  </div>
                  
        
        </div>
    </div>
</div>

@endsection