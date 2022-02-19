@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PENDING PAYOUT</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                
                <table id="all_payout" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>Wallet</th>
                            <th>Req Date</th>
                            <th>Status</th>
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($pending_payout as $key => $user)
                              <tr>
                                  <td>{{$user->firstname }} {{$user->lastname }} </td>
                                  <td>{{ $user->contact }}</td>
                                  <td>{{ $user->address }}</td>
                                  <td>₱ {{ number_format($user->amount, 2, '.', ',') }}</td>
                                  <td> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}} </td>
                                 <!--  <td>{{ $user->method }}</td> -->
                                  <td><?php if($user->status == '1') { ?> Paid <?php }else{ ?> Pending <?php }  ?></td>
                              
                                   <td> 
                                    <?php if($user->status != 1){ ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$user->payoutID }}" >Approve</button>
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancel-{{$user->payoutID }}" >Cancel</button>
                                    <?php }?>
                                </td>

                              </tr>
                          @endforeach

                               <!-- Modal -->
                              @foreach($pending_payout as $key => $user)
                                <div class="modal fade" id="exampleModal-{{$user->payoutID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Payout Releasing Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('release-payout') }}">
                                          @csrf
                                          <div class="modal-body">
                                            <input type="hidden" name="payoutID" value="{{ $user->payoutID }}">
                                            <input type="hidden" name="created_at" value="{{ $user->created_at }}">
                                            <input type="hidden" name="amount" value="{{ $user->amount }}">

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
                              @foreach($pending_payout as $key => $user)
                                <div class="modal fade" id="cancel-{{$user->payoutID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Payout Cancel Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('delete-payout') }}">
                                          @csrf
                                          <div class="modal-body">
                                       
                                              <input type="hidden" name="payoutID" value="{{ $user->payoutID }}">
                                               <input type="hidden" name="created_at" value="{{ $user->created_at }}">
                                                <input type="hidden" name="amount" value="{{ $user->amount }}">
                                                 <input type="hidden" name="id" value="{{ $user->id }}">
                                                
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


     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">APPROVED PAYOUT</h6>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                <table id="all_payout" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                <thead>
                  <tr>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>Wallet</th>
                            <th>Approve Date</th>
                         
                            <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                        
                         @foreach($approve_payout as $key => $user)
                              <tr>
                                  <td>{{$user->firstname }} {{$user->lastname }} </td>
                                  <td>{{ $user->contact }}</td>
                                  <td>{{ $user->address }}</td>
                                  <td>₱ {{ number_format($user->amount, 2, '.', ',') }}</td>
                                  <td> {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}} </td>
                          <td>
                                    <?php if($user->status == 1){ ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$user->payoutID }}" >Archived</button>
                                  
                                    <?php }?>
                                </td>

                              </tr>
                          @endforeach

                               <!-- Modal -->
                              @foreach($approve_payout as $key => $user)
                                <div class="modal fade" id="exampleModal-{{$user->payoutID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Archive Payout</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form method="POST" action="{{ route('archive-payout') }}">
                                          @csrf
                                          <div class="modal-body">
                                       
                                              <input type="hidden" name="payoutID" value="{{ $user->payoutID }}">
                                                
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

  $('#all_payout').DataTable( {
    responsive: true
} );

});
</script>

@endsection