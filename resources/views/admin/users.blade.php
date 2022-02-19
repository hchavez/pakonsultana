@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
       @if(session('success'))
       <div class="alert alert-success">{{session('success')}}</div>
      @endif

       @if(session('errors'))
    <div class="alert alert-danger">{{session('errors')}}</div>
    @endif

    @inject('sponsor', 'App\Http\Controllers\AdminController')   
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ALL USERS</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <table id="all_users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Travel Agency</th>
                            <th>Username</th>
                            <th>Sponsor</th>
                            <th>Password</th>
                            <th>ID No.</th>
                            <th>Package</th>
                            <th>FREE-Package</th>
                            <th>Reg Date</th>
                            <th>Wallet</th>
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($all_users as $key => $user)
                              <tr>
                                  <td>{{$user->firstname }} {{$user->lastname }} </td>
                                  <td> {{ $user->birthdate}} </td>
                                  <td>{{ $user->contact }}</td>
                                  <td>{{ $user->address }}</td>
                                  <td style="width: 20px;">{{ $user->email }}</td>
                                  <td>{{ $user->travel_agency_name }}</td>
                                  <td>{{ $user->username }}</td>
                                  <td>{{ $sponsor::getUsername($user->referral_id) }}  </td>
                                  <td>{{ $user->password }}</td>
                                  <td>#{{ $user->id }}</td>
                                  <td>{{ $user->package_option }}</td>
                                  <td>{{ $user->pre_package }}</td>
                                  <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                                  <td>₱ {{ number_format($user->wallet, 2, '.', ',') }}</td>
                                  <td><?php if($user->status == '1') { ?> 
                               
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deactivate-{{$user->id }}" >Deactivate</button>

                                     <?php }else{ ?> <button type="button" class="btn btn-warning btn-sm">Activate</button> <?php }  ?></td>
                              </tr>
                          @endforeach
                          </tbody>
              </table>
                
               
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">NEW PENDING USER(S)</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                
                <table id="pending_users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                     <th>Name</th>
                            <th>Birthdate</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Travel Agency</th>
                            <th>Username</th>
                             <th>Sponsor</th>
                           
                            <th>Password</th>
                            <th>ID No.</th>
                            <th>Package</th>
                            <th>FREE-Package</th>
                            <th>Reg Date</th>
                            <th>Receipt</th>
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($pending_users as $key => $user)
                              <tr>
                                  <td><a href="">{{$user->firstname }} {{$user->lastname }} </a></td>
                                  <td> {{ $user->birthdate}} </td>
                                  <td>{{ $user->contact }}</td>
                                  <td>{{ $user->address }}</td>
                                  <td style="width: 20px;">{{ $user->email }}</td>
                                  <td>{{ $user->travel_agency_name }}</td>
                                  <td>{{ $user->username }}</td>
                                  <td>{{ $sponsor::getUsername($user->referral_id) }}  </td>
                                  <td>{{ $user->password }}</td>
                                  <td>#{{ $user->id }}</td>
                                  <td>{{ $user->package_option }}</td>
                                  <td>{{ $user->pre_package }}</td>
                                 
                                  <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                                  <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#receipts-{{$user->receipt }}" >View</button>
 </td>
                                  <td>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$user->id }}" >Approve</button>

                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cancel-{{$user->id}}" >Cancel</button>
                                </td>
                              </tr>
                          @endforeach


                          <!-- Modal -->
                              @foreach($pending_users as $key => $user)
                                <div class="modal fade" id="receipts-{{$user->receipt }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">{{$user->firstname }} {{$user->lastname }} Payment Receipt : {{ $user->package_option }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/payment_receipt/{{$user->receipt }}" class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                                @endforeach


                          <!-- Modal -->
                               @foreach($pending_users as $key => $user)
                                <div class="modal fade" id="exampleModal-{{$user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Approve User Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('approve-user') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="package" value="{{ $user->package_option }}">
                                              <input type="hidden" name="user_id" value="{{$user->id }}">
                                               <input type="hidden" name="referral_id" value="{{$user->referral_id }}">
                                            
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

                              <!-- Modal -->
                               @foreach($pending_users as $key => $user)
                                <div class="modal fade" id="cancel-{{$user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Cancel User Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('delete-user') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="package" value="{{ $user->package_option }}">
                                              <input type="hidden" name="id" value="{{$user->id }}">
                                               <input type="hidden" name="referral_id" value="{{$user->referral_id }}">
                                            
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


                               <!-- Modal -->
                               @foreach($pending_users as $key => $user)
                                <div class="modal fade" id="deactivate-{{$user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Deactivate User Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('deactivate-user') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="package" value="{{ $user->package_option }}">
                                              <input type="hidden" name="id" value="{{$user->id }}">
                                               <input type="hidden" name="referral_id" value="{{$user->referral_id }}">
                                            
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

  $('#all_users').DataTable( {
    responsive: true
} );

  $('#pending_users').DataTable( {
    responsive: true
} );

});
</script>

@endsection