@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT PRODUCT ORDER</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <form method="POST" action="{{ route('product-orders') }}">
                @csrf                
                
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
               
               <input value="{{ $data->id }}" type="hidden" name="id">
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Product</label>
                    <input id="product" value="{{ $data->product }}" type="text" class="form-control @error('product') is-invalid @enderror" name="product" required  autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Method</label>
                    <input id="payment" value="{{ $data->payment }}" type="text" class="form-control @error('payment') is-invalid @enderror" name="payment" required  autofocus>
                </div>
                
                 <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input id="price" value="{{ $data->price }}" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required  autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input id="status" value="{{ $data->status }}" type="number" class="form-control @error('status') is-invalid @enderror" name="status" required  autofocus>
                </div>   

                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>  

            </div>
        </div>
    </div>
</div>

@endsection