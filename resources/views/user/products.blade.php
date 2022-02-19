@extends('layouts.user')

@section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product List </h1> 


                                         <?php $total = 0 ?>


             @foreach(session('cart') as $id => $details)
               <?php $total = $total + $details['quantity'];  ?> 
             @endforeach

              
             @if(count(session('cart') > 0))
             <a href="{{ url('/cart') }}"><button type="button" class="btn btn-info">
                   <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger"> 
                    <?php echo $total; ?></span> 
                  </button>
              </div> </a> 
             @endif

          <div class="row">

          <div class="col-xl-12 col-lg-12">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                  <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <div class="row">
                      @foreach($products as $key => $ref)
                      <div class="col">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-4">
                              <div style="vertical-align: bottom; height: 160px;"><center>

                                <a href="#product-{{$ref->id }}" data-toggle="modal" data-target="#product-{{$ref->id }}" > <img src="/images/products/{{$ref->image }}" height="150px" width="150px" /> </a>

                                 </center></div>
                              <div style="color: #000; font-size: 12px;"> <center>{{$ref->product_name }}</center></div>
                                <div style="color: #000; font-size: 12px;"> <center>PHP {{number_format($ref->price,2) }} </center></div>
                              <center>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtocart-{{$ref->id }}">ADD TO CART</button> -->
                                <a href="{{ url('add-to-cart/'.$ref->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach


                      @foreach($products as $key => $ref)
                      <!-- Modal -->
                        <div class="modal fade"id="addtocart-{{$ref->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Purchase Product Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="POST" action="{{ route('add-to-cart') }}" style="padding: 20px;">
                                @csrf                
                                
                                <input type="hidden" value="{{$ref->id }}" name="product_id">
                                <input type="hidden" value="{{Auth::user()->id }}" name="user_id">

                                <div class="form-group">
                                    <center>
                                    <img src="/images/products/{{$ref->image }}" height="250px" width="300px" /> </center>
                                </div>
                              
                               <div class="form-group">
                                    <label for="exampleInputEmail1">{{$ref->product_name }}</label>
                                </div>

                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">PHP {{number_format($ref->price,2) }}</label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity: <input type="text" required="required" name="quantity" id="quantity"></label>
                                </div>

                                 <button type="submit" class="btn btn-primary">Submit</button>
                                </form>  

                            </div>
                          </div>
                        </div>               
                      <!-- modal -->
                        @endforeach

                    </div>
                  
                </div>
              </div>
              <!-- modal -->

            </div>



             <!-- Modal -->
                            @foreach($products as $key => $ref)
                                <div class="modal fade" id="product-{{$ref->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                            Product Name: {{$ref->product_name }} <br>
                                            Description: {{$ref->description }} <br>
                                            Price: PHP {{number_format($ref->price,2) }}
                                            <img src="/images/products/{{$ref->image }}" class="img-responsive" width="100%"> <br>
                                             <a href="{{ url('add-to-cart/'.$ref->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                                @endforeach

@endsection

@section('scripts')

    <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>

@stop
