@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> PAYMENT METHOD <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpaymentmethod"> ADD </button></h6> 

        </div>
        <div class="card-body">
           @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
            <div class="main-content"> 

                <table id="payment_methods" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                      <th>Icon</th>
                            <th>Name</th>
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($payment_details as $key => $data)
                              <tr>
                                  <td><img src="/images/payment_methods/{{ $data->icon }}" height="100px" width="100px" /></td>
                                  <td>{{ $data->name }}</td>
                                  <td> 

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#paymentmethod-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/payment-method-delete') }}/{{ $data->id }}">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>


                                    </td>
                              </tr>
                          @endforeach
                          </tbody>
              </table>
            </div>

            

            
        </div>



        <!-- Modal add gadget-->
                <div class="modal fade" id="addpaymentmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                      <form method="POST" action="{{ route('payment-method-add') }}" enctype="multipart/form-data">
                        @csrf                
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                        </div>
                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Icon</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  autofocus>
                        </div>


                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                        </div>

                    </div>
                  </div>
                </div>               
              <!-- modal -->

              <!-- Modal update gadget-->
              @foreach($payment_details as $key => $data)
                <div class="modal fade" id="paymentmethod-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                     
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('payment-methods') }}">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                       
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                        </div>
                        
                    

                        <div class="form-group">
                            <label for="exampleInputEmail1">Icon</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                        </div>


                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                    </div>
                  </div>
                </div>
                @endforeach
              <!-- modal -->

    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $('#payment_methods').DataTable( {
    responsive: true
} );

});
</script>

@endsection