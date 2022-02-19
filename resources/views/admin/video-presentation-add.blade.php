@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">VIDEO PRESENTATION ADD</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <form method="POST" action="">
                @csrf                
                
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Video link</label>
                    <input id="video_link" type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" required  autofocus>
                </div>
                
                 <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" required  autofocus>
                </div>                  

                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>  

            </div>
        </div>
    </div>
</div>

@endsection