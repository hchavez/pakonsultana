@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> INCENTIVE QUALIFIERS</h6>
        </div>
        <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
               <div class="main-content"> 
                
                <table id="gadget_incentives" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                         
                            <th>Account</th>
                            <th>Incentive</th>
                            <th>Date</th>
                            <th>DRP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                        
                          @foreach($incentives as $key => $value)
                              <tr>
                                  <td>{{$value->firstname }} {{$value->lastname }} </td>
                                  <td>{{ $value->address }}</td>
                                  <td>{{ $value->contact }}</td>
                                 
                                  <td>{{ $value->package_option }}</td>
                                  <td>{{ $value->title }}</td>
                                  <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y')}} </td>
                                  <td>{{ $value->drp }}</td>
                                  <td> 
                                    <?php if($value->status != 1){ ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$value->incentive_transID }}" >Approve</button>
                                    <button type="button" class="btn btn-warning btn-sm">Cancel</button> 
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-info btn-sm">Released</button> 
                                    <?php }?>
                                </td>
                              </tr>
                          @endforeach

                            <!-- Modal -->
                              @foreach($incentives as $key => $value)
                                <div class="modal fade" id="exampleModal-{{$value->incentive_transID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Incentive Releasing Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('release-incentive') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="type" value="travel">
                                              <input type="hidden" name="incentive_transID" value="{{ $value->incentive_transID }}">
                                             
                                            
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


        <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
               <div class="main-content"> 
                
                <table id="gadget_incentives_released" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                     
                            <th>Account</th>
                            <th>Incentive</th>
                            <th>Date</th>
                            <th>DRP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                        
                          @foreach($incentives_approved as $key => $value)
                              <tr>
                                  <td>{{$value->firstname }} {{$value->lastname }} </td>
                                  <td>{{ $value->address }}</td>
                                  <td>{{ $value->contact }}</td>
                           
                                  <td>{{ $value->package_option }}</td>
                                  <td>{{ $value->title }}</td>
                                  <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y')}} </td>
                                  <td>{{ $value->drp }}</td>
                                  <td> 
                                    <?php if($value->status != 1){ ?>
                                    <button type="button" class="btn btn-warning btn-sm">Archived</button> 
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-info btn-sm">Released</button> 
                                    <?php }?>
                                </td>
                              </tr>
                          @endforeach

                            <!-- Modal -->
                              @foreach($incentives_approved as $key => $value)
                                <div class="modal fade" id="exampleModal-{{$value->incentive_transID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Incentive Releasing Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('release-incentive') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="type" value="travel">
                                              <input type="hidden" name="incentive_transID" value="{{ $value->incentive_transID }}">
                                             
                                            
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

  $('#gadget_incentives').DataTable( {
    responsive: true
} );

$('#gadget_incentives_released').DataTable( {
    responsive: true
} );


});
</script>

@endsection