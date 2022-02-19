@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">INCENTIVES SETTINGS</h6>
        </div>
        <div class="card-body">       

            <div id="exTab2" class=""> 
                <ul class="nav nav-tabs">
                    
                    <li class="nav-item nav-link active"><a  href="#1" data-toggle="tab">Gadget</a></li>
                    <li><a class="nav-item nav-link" href="#2" data-toggle="tab">Travel</a></li>
                    <li><a class="nav-item nav-link" href="#3" data-toggle="tab">Car</a></li>
                </ul>
                @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                      
                        <table id="gadget_incentives" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>DRP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($all_gadget_incentives as $key => $data)
                                <tr>
                                    <td><a href="" data-toggle="modal" data-target="#myModal{{ $data->image }}"><img src="/images/{{ $data->image }}" height="60px" width="60px" /></a></td>

                                    <div class="modal fade" id="myModal{{ $data->image }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">{{$data->name }} </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/{{ $data->image }} " class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>



                                    <td>{{ $data->name }} </td>
                                    <td>{{ $data->drp }}</td>
                                    <td> 
                                        <!--a href="{{ url('admin/incentive-settings') }}/{{ $data->id }}/?type=gadget">
                                            <button type="button" class="btn btn-success btn-sm">Update</button> 
                                        </a-->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#gadget-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/incentive-settings-delete') }}/{{ $data->id }}/?type=gadget">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--a href="{{ url('admin/incentive-settings-add?type=gadget') }}"><button type="button" class="btn btn-primary btn-xs" id="createNewProduct">Add New Gadget</button></a-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addgadget">Add New Gadget</button>


                    </div>
                    <div class="tab-pane" id="2">
                        
                        <table id="gadget_incentives" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>DRP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($all_travel_incentives as $key => $data)
                                <tr>
                           

                                    <td><a href="" data-toggle="modal" data-target="#myModal{{ $data->image }}"><img src="/images/{{ $data->image }}" height="60px" width="60px" /></a></td>

                                    <div class="modal fade" id="myModal{{ $data->image }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">{{$data->name }} </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/{{ $data->image }} " class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>

                                    <td>{{ $data->name }} </td>
                                    <td>{{ $data->drp }}</td>
                                    <td> 
                                        <!--a href="{{ url('admin/incentive-settings') }}/{{ $data->id }}/?type=travel">
                                            <button type="button" class="btn btn-success btn-sm">Update</button> 
                                        </a-->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#travel-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/incentive-settings-delete') }}/{{ $data->id }}/?type=travel">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--a href="{{ url('admin/incentive-settings-add?type=travel') }}"><button type="button" class="btn btn-primary btn-xs" id="createNewProduct" data-toggle="modal">Add New Travel</button></a-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtravel">Add New Travel</button>

                    </div>
                    <div class="tab-pane" id="3">
                      
                        <table id="gadget_incentives" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>DRP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($all_car_incentives as $key => $data)
                                <tr>
                                    <td><a href="" data-toggle="modal" data-target="#myModal{{ $data->image }}"><img src="/images/{{ $data->image }}" height="60px" width="60px" /></a></td>

                                    <div class="modal fade" id="myModal{{ $data->image }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">{{$data->name }} </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/{{ $data->image }} " class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                                    <td>{{ $data->name }} </td>
                                    <td>{{ $data->drp }}</td>
                                    <td> 
                                        <!--a href="{{ url('admin/incentive-settings') }}/{{ $data->id }}/?type=car">
                                            <button type="button" class="btn btn-success btn-sm">Update</button> 
                                        </a-->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#car-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/incentive-settings-delete') }}/{{ $data->id }}/?type=car">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--a href="{{ url('admin/incentive-settings-add?type=car') }}"><button type="button" class="btn btn-primary btn-xs" id="createNewProduct" data-toggle="modal" data-target="#myModal">Add New Car</button></a-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcar">Add New Car</button>
                        
                    </div>
                </div>
              </div>

               <!-- Modal add gadget-->
                <div class="modal fade" id="addgadget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Gadget</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings-add') }}" enctype="multipart/form-data">
                        @csrf                
                        
                        
                        <input type="hidden" value="gadget" name="type">
                        
                       
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

                        <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>                   

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->

              <!-- Modal add gadget-->
                <div class="modal fade" id="addtravel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Travel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings-add') }}" enctype="multipart/form-data">
                        @csrf                
                        
                        
                        <input type="hidden" value="travel" name="type">
                       
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

                       <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>         

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->

              <!-- Modal add gadget-->
                <div class="modal fade" id="addcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Car</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings-add') }}" enctype="multipart/form-data">
                        @csrf                
                        
                        
                        <input type="hidden" value="car" name="type">
                       
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

                        <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>         

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->

              
              <!-- Modal update gadget-->
              @foreach($all_gadget_incentives as $key => $data)
                <div class="modal fade" id="gadget-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Gadget ID: {{$data->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings') }}">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        <input type="hidden" value="gadget" name="type">
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">DRP</label>
                            <input id="drp" type="text" value="{{ $data->drp }}" class="form-control @error('drp') is-invalid @enderror" name="drp" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                        </div>

                        <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>        
                         

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                    </div>
                  </div>
                </div>
                @endforeach
              <!-- modal -->

              <!-- Modal update travel-->
              @foreach($all_travel_incentives as $key => $data)
                <div class="modal fade" id="travel-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Travel ID: {{$data->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings') }}">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        <input type="hidden" value="travel" name="type">
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">DRP</label>
                            <input id="drp" type="text" value="{{ $data->drp }}" class="form-control @error('drp') is-invalid @enderror" name="drp" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  autofocus>
                        </div>

                       <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>       

                         

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                    </div>
                  </div>
                </div>
                @endforeach
              <!-- modal -->

              <!-- Modal update car-->
              @foreach($all_car_incentives as $key => $data)
                <div class="modal fade" id="car-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Car ID: {{$data->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('incentive-settings') }}">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        <input type="hidden" value="car" name="type">
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input id="name" type="text" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">DRP</label>
                            <input id="drp" type="text" value="{{ $data->drp }}" class="form-control @error('drp') is-invalid @enderror" name="drp" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  autofocus>
                        </div>

                     <input id="status" type="hidden" class="form-control @error('status') is-invalid @enderror" name="status" value="1" autofocus>       

                         

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

@endsection
<style type="text/css">
.modal-content{padding:0 1em;}
</style>