@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PRODUCT LIST <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct">Add</button></h6>
        </div>
        <div class="card-body">       

            <div id="exTab2" class=""> 
             
                
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                      
                        <table id="products" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $key => $data)
                                <tr>
                                    <td><a href="" data-toggle="modal" data-target="#myModal{{ $data->image }}"><img src="/images/products/{{ $data->image }}" height="60px" width="60px" /></a></td>

                                    <div class="modal fade" id="myModal{{ $data->image }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                           <h5 class="modal-title" id="exampleModalLabel">{{$data->product_name }} </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        
                                              <div class="modal-body">
                                           
                                                <img src="/images/products/{{ $data->image }} " class="img-responsive" width="100%"> <br>
                                                
                                              </div>                          
                                    
                                        </div>
                                      </div>
                                    </div>


                                    <td>{{ $data->product_name }} </td>
                                     <td>{{ $data->description }} </td>
                                      <td>{{ $data->quantity   }} </td>
                                    <td>P {{ number_format($data->price, 2) }}</td>
                                    <td>
                                        <!--a href="{{ url('admin/incentive-settings') }}/{{ $data->id }}/?type=product">
                                            <button type="button" class="btn btn-success btn-sm">Update</button> 
                                        </a-->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#product-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/product-delete') }}/{{ $data->id }}">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--a href="{{ url('admin/incentive-settings-add?type=product') }}"><button type="button" class="btn btn-primary btn-xs" id="createNewProduct">Add New product</button></a-->
                      


                    </div>
                    
                    
                </div>
              </div>

               <!-- Modal add product-->
                <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('product-add') }}" enctype="multipart/form-data">
                        @csrf                
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  autofocus>
                        </div>
                        <input id="status" type="hidden" value="1" name="status">

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->

              
              <!-- Modal update product-->
              @foreach($products as $key => $data)
                <div class="modal fade" id="product-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit product ID: {{$data->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('products') }}" enctype="multipart/form-data">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" value="{{ $data->product_name }}" class="form-control @error('product_name') is-invalid @enderror" name="product_name" required  autofocus>
                        </div>
                        
                           <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input id="description" value="{{ $data->description }}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input id="price" value="{{ $data->price }}" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input id="quantity" value="{{ $data->quantity }}" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"  autofocus>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  autofocus>
                        </div>


                        <img src="/images/products/{{ $data->image }} " class="img-responsive" width="100%">
                        <br> <br>

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                    </div>
                  </div>
                </div>
                @endforeach

              <!-- modal -->
        </div>
    </div>
</div>


<style type="text/css">
.modal-content{padding:0 1em;}


</style>
<script type="text/javascript">
$(document).ready(function(){

  $('#products').DataTable( {
    responsive: true
} );

});
</script>

@endsection
