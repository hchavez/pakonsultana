@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PRODUCT ORDERS DETAILS - ORDER NO: 00{{ $id }} </h6>
        </div>
        <div class="card-body">
              @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
            <div class="main-content"> 
                  <table id="product-orders" class="table table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                             <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $overallamt=0 ?>
                       @foreach( $data as $key => $value)
                            <tr>
                                <td>{{ $value->product_name }} </td>
                                <td>{{ $value->quantity }}</td>
                                  <td>P {{ number_format($value->price, 2) }}</td>
                                  <td>
                                    <?php
                                    $amt = $value->quantity * $value->price;
                                    $overallamt+= $amt;
                                    $address = $value->address;
                                    $contact = $value->contact;
                                    ?>
                                    <?php 
                                    echo "P ".number_format((float)$amt, 2, '.', '');;
                                    ?>
                                    </td>
                            </tr>
                        @endforeach

                         <tr>
                                 <td colspan="3"><h5>Overall Total:
                                </h5></td>
                                <td style="text-align: left;"><h5><?php 
                                    echo "P ".number_format((float)$overallamt, 2, '.', '');;
                                    ?>
                                </h5></td>
                            </tr>
                       
                            <tr>
                               <td colspan="4" style=" text-align: left;"><strong>Name: <?php echo $value->name; ?> </strong></td>
                            </tr>

                             <tr>
                               <td colspan="4" style=" text-align: left;"><strong>Delivery Address: <?php echo $value->address; ?> </strong></td>
                            </tr>
                              <tr>
                               <td colspan="4" style=" text-align: left;"><strong>Contact No: <?php echo $value->phone; ?> </strong></td>
                            </tr>
                             
                              <tr>
                               <td colspan="4" style=" text-align: left;">
                                <?php if($value->status=="ongoing"){ ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Delivered-{{$value->order_id }}" >Order Shipped Out</button>
                                <?php }else{ ?>
                                    Status: <h5>Delivered </h5>
                            <?php } ?>
                             </td>
                            </tr>
                            <tr>
                               <td colspan="4" >
                              <img src="/images/payment_receipt/{{$value->order_receipt }}" class="img-responsive" width="70%"> </td>
                            </tr>


                                 @foreach( $data as $key => $value)
                                <div class="modal fade" id="Delivered-{{$value->order_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Product Order Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('approve-order') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="order_id" value="{{$value->order_id }}">
                                                
                                            Are you sure you want to continue?
                                            <br>
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
