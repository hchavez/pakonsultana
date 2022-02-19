@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">NEW UPGRADE USER(S)</h6>
        </div>@if(session('success'))
           <div class="alert alert-success">{{session('success')}}</div>
          @endif

       @if(session('errors'))
        <div class="alert alert-danger">{{session('errors')}}</div>
        @endif
        <div class="card-body">
            <div class="main-content"> 
                
                <table id="pending_users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                      <th>Name</th>
                            <th>Birthdate</th>
                            <th>Mobile No.</th>
                            <th>Sponsor ID</th>
                            <th>Package</th>
                            <th>Incentive Package</th>
                             <th>Travel Agency</th>
                             <th>Pre Package</th>
                            <th>Reg Date</th>
                            <th>Receipt</th>
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($upgrade_users as $key => $user)
                              <tr>
                                  <td>{{$user->firstname }} {{$user->lastname }} </td>
                                  <td> {{ \Carbon\Carbon::parse($user->birthdate)->format('d/m/Y')}} </td>
                                  <td>{{ $user->contact }}</td>
                                  <td>#{{ $user->referral_id }}</td>
                                  <td>{{ $user->package_option }}</td>
                                  <td>{{ $user->type }}</td>
                                   <td>{{ $user->travel_agency_name }}</td>
                                    <td>{{ $user->pre_package }}</td>
                                  <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                                  <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#receipts-{{$user->receipts }}" >View</button>
 </td>
                                  <td>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$user->payment_receipt_id }}" >Approve</button>
                                    <button type="button" class="btn btn-warning btn-sm">Cancel</button> </td>
                              </tr>
                          @endforeach


                          <!-- Modal -->
                              @foreach($upgrade_users as $key => $user)
                                <div class="modal fade" id="receipts-{{$user->receipts }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">{{$user->firstname }} {{$user->lastname }} Upgrade Payment Receipt : {{ $user->package_option }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    
                                          <div class="modal-body">
                                       
                                            <img src="/images/payment_receipt/{{ $user->receipts }} " class="img-responsive" width="100%"> <br>
                                            
                                          </div>                          
                                
                                    </div>
                                  </div>
                                </div>
                                @endforeach


                          <!-- Modal -->
                               @foreach($upgrade_users as $key => $user)
                                <div class="modal fade" id="exampleModal-{{$user->payment_receipt_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Upgrade User Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('upgrade-user') }}">
                                          @csrf
                                          <div class="modal-body">
                                              <input type="hidden" name="package_option" value="vip">
                                              <input type="hidden" name="role" value="vip">
                                              <input type="hidden" name="incentive_option" value="{{ $user->type }}">
                                               <input type="hidden" name="pre_package" value="{{ $user->pre_package }}">
                                              <input type="hidden" name="user_id" value="{{ $user->id }}">
                                               <input type="hidden" name="referral_id" value="{{$user->referral_id }}">
                                                <input type="hidden" name="payment_receipt_id" value="{{$user->payment_receipt_id }}">
                                               
                                            
                                            Approve User to {{$user->type}}?

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