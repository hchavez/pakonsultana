@extends('layouts.user')

@section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cart Order and Checkout</h1>
          </div>
          <div class="row">


          <div class="col-xl-12 col-lg-12">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                  <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                      <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $total = 0 ?>
                           

                             @if(count(session('cart') > 0))
                                @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="/images/products/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                <div class="col-sm-9">
                                                   {{ $details['name'] }}
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">PHP {{number_format($details['price'],2) }} </td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">PHP {{ number_format($details['price'] * $details['quantity'],2) }}</td>
                                        <td class="actions" data-th="">
                                           
                                            <button id="update-cart{{ $id }}" class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button> 
                                            <button id="remove-from-cart{{ $id }}" class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                             @else
                                <tr>
                                        <td data-th="Product">
                                            No Product Found
                                        </td>
                                        <td data-th="Price"> </td>
                                        <td data-th="Quantity">
                                          
                                        </td>
                                        <td data-th="Subtotal" class="text-center"></td>
                                        <td class="actions" data-th="">
                                           
                                        </td>
                                    </tr>
                             @endif
                            </tbody>
                            <tfoot>
                      
                            <tr>
                                <td><a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                <td colspan="1" class="hidden-xs"></td><td colspan="1" class="hidden-xs"><strong>Sub Total</strong></td>
                                <td colspan="1" class="text-center"><strong> PHP {{number_format($total,2) }}</strong></td>
                                <td class="hidden-xs text-center"></td>
                            </tr>
                             <tr>
                                <td></td>
                                <td colspan="1" class="hidden-xs"></td><td colspan="1" class="hidden-xs"><strong>Discount</strong></td>

                                <?php
                            
                                echo Auth::user()->package_option;
                                //I want to get 25% of 928.
                                if(Auth::user()->package_option == 'vip'){
                                     $percentToGet = 40;
                                 }else{
                                     $percentToGet = 30;
                                }
                                echo $percentToGet;
                                //Convert our percentage value into a decimal.
                                $percentInDecimal = $percentToGet / 100;

                                //Get the result.
                                $percent = $percentInDecimal * $total;

                                $overall = $total - $percent;

                                ?>
                                <td colspan="1" class="text-center"><strong> PHP {{number_format($percent,2) }}</strong></td>
                                <td class="hidden-xs text-center"></td>
                            </tr>
                              <tr>
                                <td></td>
                                <td colspan="1" class="hidden-xs"></td><td colspan="1" class="hidden-xs"><strong>Overall Total</strong></td>

                          
                                <td colspan="1" class="text-center"><strong> PHP {{number_format($overall,2) }}</strong></td>
                                <td class="hidden-xs text-center"></td>
                            </tr>
                            </tfoot>
                        </table>
                </div>


                @if(count(session('cart') > 0))
                <div class="card-body">
                     <form method="POST" action="{{ route('product-order') }}" enctype="multipart/form-data" style="padding: 20px;">
                        @csrf                
                     
                        <input type="hidden" value="{{Auth::user()->id }}" name="user_id">
                        <input type="hidden" value=" {{number_format($overall,2) }}" name="total">
                      

                        <div class="form-group">
                         <label for="exampleInputEmail1">Name</label>
                                 <input class="form-control"  type="text" name="name" required="">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="form-group">
                         <label for="exampleInputEmail1">Address</label>
                                 <input  class="form-control"  type="text" name="address" required="">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="form-group">
                         <label for="exampleInputEmail1">Phone No</label>
                                 <input class="form-control"  type="text" name="phone" required="">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                       <div class="form-group">
                         <label for="exampleInputEmail1">Payment Option</label>
                                <select class="form-control" name="payment_option" id="payment_option">
                                   <option>Choose...</option>
                                  <option value="online">Online Payment</option>
                                  <option value="bank_deposit">Bank Deposit</option>
                                  <option value="remitance">Any Remitance</option>
                                </select>

                                @error('payment_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="online_silver"> Click below to pay online and screenshot your payment confirmation receipt to upload: <br>
                                    <a href="https://www.paypal.com/webapps/hermes?token=5481043120415492F&useraction=commit&mfid=1585585126898_35430053e1529" target="_blank"><img src="/images/paypal.png" style="width: 165px; height: 80px; float: left;  margin-right: 25px; border: aliceblue; border-style: outset;"></a>
                                </div>
                                <div id="online_gold">Click below to pay online and screenshot your payment confirmation receipt to upload: <br>
                                    <a href="https://www.paypal.com/webapps/hermes?token=87N49416HU625002X&useraction=commit&mfid=1585585263310_e080ea24db297" target="_blank"><img src="/images/paypal.png" style="width: 165px; height: 80px; float: left;  margin-right: 25px; border: aliceblue; border-style: outset;"></a>
                                </div>
                                <p id="bank_deposit">
                                    <img src="/images/bdo.png" style="width: 165px; height: 110px; float: left;  margin-right: 25px;">
                                    <br> 
                                    EBIYAHE SERVICES CO. <br> 
                                    ACCOUNT NO.: 003440347871 <br> 
                                    BDO ACCNT NAME:(SAVINGS) <br> <br> 
                                    <img src="/images/bpi.png" style="width: 170px; height: 100px; float: left;  margin-right: 25px;">
                                    <br> 
                                    EBIYAHE SERVICES CO. <br> 
                                    BPI ACCNT NO.: 9941-0005-14 <br> 
                                    BPI ACCNT NAME: (CURRENT) <br> 
                                </p>
                                 <p id="remitance">
                                     <strong> ANY REMITTANCE </strong> <br> 
                                     EBIYAHE SERVICES CO. <br> 
                                     JASON GENERAL <br> 
                                     09773311338 <br> 
                                      CEBU CITY <br> 
                                       </p>
                                   </div>
                               </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Payment Receipt</label>
                            <input id="image" onchange="checkextension()" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  autofocus>
                        </div>                

                         <button type="submit" class="btn btn-primary">Proceed Order</button>
                        </form>  
                </div>
                @endif
              </div>
              <!-- modal -->

            </div>

<script type="text/javascript">
  
  function checkextension() {
              var file = document.querySelector("#payment_receipt");
              if ( /\.(jpeg|jpg)$/i.test(file.files[0].name) === false ) { alert("File is not supported use .jpeg file"); }
            }

</script>

<?php foreach(session('cart') as $id => $details) {  ?>


    <script type="text/javascript">
      var editProd= "#update-cart"+{{ $id }};
       var deleteProd= "#remove-from-cart"+{{ $id }};

       console.log(editProd);
       console.log(deleteProd);
    


              $(editProd).click(function (e) {
              //alert(editProd);
                 e.preventDefault();
                 var ele = $(this);

                  $.ajax({
                     url: '{{ url('update-cart') }}',
                     method: "patch",
                     data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                     success: function (response) {
                         window.location.reload();
                     }
                  });
              });
             

    $(deleteProd).click(function (e) {
         
            e.preventDefault();
            var ele = $(this);
   
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            
        });



    </script>



<?php } ?>

<script type="text/javascript">
        
            function checkextension() {
              var file = document.querySelector("#payment_receipt");
              if ( /\.(jpeg|png|jpg)$/i.test(file.files[0].name) === false ) { alert("File is not supported use .jpeg file"); }
            }

        $(document).ready(function(){
            
             //$("#hidediv").hide();

            $("#online_silver").attr("style", "display: none !important");
            $("#online_gold").attr("style", "display: none !important");
            $("#bank_deposit").attr("style", "display: none !important");
            $("#remitance").attr("style", "display: none !important");

           

            $("#payment_option").change(function () {
                var pick = this.value;
                var firstDropVal = $('#pick').val();
                var packageval = $('select#package_option option:selected').val();

                if(pick == 'bank_deposit'){
                      $("#bank_deposit").attr("style", "display: inline !important");
                        $("#online_silver").attr("style", "display: none !important");
                        $("#online_gold").attr("style", "display: none !important");
                        $("#remitance").attr("style", "display: none !important");
                }

                if(pick == 'remitance'){
                      $("#remitance").attr("style", "display: inline !important");
                    $("#online_silver").attr("style", "display: none !important");
                    $("#online_gold").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                }


                if(pick == 'online'){
                      $("#online_gold").attr("style", "display: inline !important");
                     $("#online_silver").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                    $("#remitance").attr("style", "display: none !important");
                }

                console.log(packageval);
                console.log(pick);
            });
        });

</script>



@endsection
