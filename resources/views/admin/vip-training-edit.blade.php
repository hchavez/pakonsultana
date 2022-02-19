@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">VIP TRAININGS EDIT</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <form method="POST" action="{{ route('vip-training') }}">
                @csrf                
                
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
               
               <input value="{{ $data->id }}" type="hidden" name="id">
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Method</label>
                    <input id="payment_method" value="{{ $data->payment_method }}" type="text" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" required  autofocus>
                </div>
                
                 <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input id="amount" value="{{ $data->amount }}" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" required  autofocus>
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