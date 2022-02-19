@extends('layouts.user')

@section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">MW Gadget Incentives</h1>
          </div>
            <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="background-image: linear-gradient(#456ad9, #5cc6f8);">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h4 mb-0 font-weight text-white-800" style="color: #fff;">Gadget Incentive</div> <br>
                      <a href="{{ url('gadget-incentive') }}"><button type="button" class="btn btn-warning">Click to View</button></a>
                    </div>
                    <div class="col-auto">
                      <img src="/images/gadget_incentive.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>

       
           <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="background-image: linear-gradient(#456ad9, #5cc6f8);">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h4 mb-0 font-weight text-white-800" style="color: #fff;">Travel Incentive</div> <br>
                      <a href="{{ url('travel-incentive') }}"><button type="button" class="btn btn-warning">Click to View</button></a>
                    </div>
                    <div class="col-auto">
                      <img src="/images/travel_incentive.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>

       
             <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="background-image: linear-gradient(#456ad9, #5cc6f8);">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h4 mb-0 font-weight text-white-800" style="color: #fff;">Car Incentive</div> <br>
                      <a href="{{ url('car-incentive') }}"><button type="button" class="btn btn-warning">Click to View</button></a>
                    </div>
                    <div class="col-auto">
                      <img src="/images/car_incentive.png">
                    </div>
                  </div>
                </div>
              </div>
            </div> 

        
          </div>

          <div class="col-xl-12 col-lg-12">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">(Gadget Points) Balance: {{Auth::user()->drp }}</h6>
                </div>
                  
                  <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="row">
                      <p style="padding-left: 15px; color: red; font-size: 14px;">NOTE: You may choose to avail either the  Gadget incentive, Travel incentive or Dream car incentive. Please be reminded that once you have enrolled your account to your chosen incentive, it will be considered final.</p>

                       @foreach($data as $key => $ref)
                      <div class="col">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-4">
                              <div style="vertical-align: bottom; height: 160px;"><center><img src="/images/{{$ref->image }}" height="150px" width="150px" /> </center></div>
                              <div style="color: #000; font-size: 12px;"> <center>{{$ref->name }}</center></div>
                                <div style="color: #000; font-size: 12px;"> <center>DRP: {{$ref->drp }}</center></div>
                                <center>
                                  <?php if (Auth::user()->role = "vip"){ ?>
                        
                                      <?php if (Auth::user()->drp > $ref->drp){ ?>
                                      <button type="button" class="btn btn-primary" data-toggle="modal" <?php if (Auth::user()->incentive_option != "gadget"){ ?> disabled="" <?php } ?> data-target="#exampleModal-{{$ref->id }}" >Avail Now</button>
                                      <?php }else{ ?>
                                       <button type="button" class="btn btn-primary" disabled="">Not Enough Points</button>
                                      <?php } ?>
                                 <?php }else{ ?>
                                   <button type="button" class="btn btn-primary" disabled="">Not Available for Premium Package User</button>
                                   <p>Go To <a href="/profile"> Profile </a> to Upgrade to VIP Package</p>
                                 <?php } ?>
                              </center>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  
                </div>
              </div>
              <!-- modal -->
              <!-- Modal -->
              @foreach($data as $key => $ref)
                <div class="modal fade" id="exampleModal-{{$ref->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to avail {{$ref->name }}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('save-incentive') }}">
                          @csrf
                          <div class="modal-body">
                              <input type="hidden" name="type" value="gadget">
                              <input type="hidden" name="incentive_id" value="{{$ref->id }}">
                              <input type="hidden" name="drp" value="{{$ref->drp }}">
                              <input type="hidden" value="{{$id}}" name="user_id">
                            
                          {{$ref->drp }} points will be deducted. Please confirm to continue.. 
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
            </div>

@endsection
<script type="text/javascript">
(function($){

  $('#yourModalId').on('show', function(e) {
      var link     = e.relatedTarget(),
          modal    = $(this),
          username = link.data("username"),
          email    = link.data("email");

      modal.find("#email").val(email)
      modal.find("#username").val(username)
  })

})(jQuery)
</script>