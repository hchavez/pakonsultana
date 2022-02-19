@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ADD <?php echo strtoupper($_GET['type']); ?> INCENTIVES</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <form method="POST" action="" enctype="multipart/form-data">
                @csrf                
                
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <input type="hidden" value="<?php echo $_GET['type']; ?>" name="type">
               
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                </div>
                
                 <div class="form-group">
                    <label for="exampleInputEmail1">DRP</label>
                    <input id="drp" type="text" class="form-control @error('drp') is-invalid @enderror" name="drp" required  autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <input id="status" type="number" class="form-control @error('status') is-invalid @enderror" name="status" required  autofocus>
                </div>   

                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>  

            </div>
        </div>
    </div>
</div>

@endsection