@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PRODUCT ORDERS</h6>
        </div>
        <div class="card-body">
              @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
            <div class="main-content"> 
                  <table id="product-orders" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                             <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Phoneno</th>
                            <th>Amount</th>
                            <th>Payment Option</th>
                            <th>Receipt</th>
                            <th>Date Ordered</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach( $data as $key => $value)
                     <tr>
                        <td>00{{ $value->id }}</button></td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->address }} </td>
                                <td>{{ $value->phoneno }} </td>

                                <td>P {{ number_format($value->total, 2) }}</td>
                                <td>{{ $value->payment_option }}</td>
                                <td>
                                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#or-{{$value->id }}">Receipt</button>
                                </td>
                                <td><?php echo date('Y/m/d h:i:s A' , strtotime($value->created_at)); ?></td>
                                <td>{{ $value->status }}</td>
                                <td>
                                   
                                   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cancel-{{$value->id}}" >Cancel</button>

                                    <a href="{{ url('admin/product-orders-details') }}/{{ $value->id }}"><button class="btn btn-danger btn-sm">View</button></a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Modal -->
                           @foreach( $data as $key => $value)
                                <div class="modal fade" id="or-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Order from {{$value->firstname }} {{$value->lastname }} Order No: 00{{ $value->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/payment_receipt/{{$value->order_receipt }}" class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                            @endforeach

                    </tbody>
                </table> 
            </div>
        </div>



        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PRODUCT ORDERS - DELIVERED</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                  <table id="product-orders" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Phoneno</th>
                            <th>Amount</th>
                            <th>Payment Option</th>
                            <th>Receipt</th>
                            <th>Date Ordered</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach( $dispatch as $key => $value)
                     <tr>
                        <td>00{{ $value->id }}</button></td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->address }} </td>
                                <td>{{ $value->phoneno }} </td>
                                <td>P {{ number_format($value->total, 2) }}</td>
                                <td>{{ $value->payment_option }}</td>
                                <td>
                                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#or-{{$value->id }}">Receipt</button>
                                </td>
                                <td><?php echo date('Y/m/d h:i:s A' , strtotime($value->created_at)); ?></td>
                                <td>{{ $value->status }}</td>
                                <td>
                                    <!-- <a href="{{ url('admin/product-orders') }}/{{ $value->id }}"><button class="btn btn-success btn-sm">Delivered</button></a> -->
                                    <a href="{{ url('admin/product-orders-details') }}/{{ $value->id }}"><button class="btn btn-danger btn-sm">View</button></a>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Modal -->
                           @foreach( $dispatch as $key => $value)
                                <div class="modal fade" id="or-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Order from {{$value->firstname }} {{$value->lastname }} Order No: 00{{ $value->id }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                            <img src="/images/payment_receipt/{{$value->order_receipt }}" class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                            @endforeach

                            <!-- Modal -->
                                @foreach( $data as $key => $value)
                                <div class="modal fade" id="cancel-{{$value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Cancel Order Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('delete-order') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="id" value="{{$value->id }}">
                                            
                                            Are you sure you want to continue?

                                            <br> <br>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                          </div>                          
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              <!-- modal -->


                    </tbody>
                </table> 
            </div>
        </div>

    </div>
</div>



<script type="text/javascript">
$(document).ready(function(){

  $('#product-orders').DataTable( {
    responsive: true
} );

  $('#pending_users').DataTable( {
    responsive: true
} );

});
</script>

@endsection
