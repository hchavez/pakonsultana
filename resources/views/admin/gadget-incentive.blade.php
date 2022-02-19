@extends('layouts.user')

@section('content')

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gadget Incentives</h1>
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

            <!-- Earnings (Monthly) Card Example -->
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

            <!-- Earnings (Monthly) Card Example -->
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
                    <div class="row">
                      <p style="padding-left: 15px;">NOTE: You may choose to avail either the  Gadget incentive, Travel incentive or Dream car incentive. Please be reminded that once you have enrolled your account to your chosen incentive, it will be considered final.</p>

                       @foreach($data as $key => $ref)
                      <div class="col">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-4">
                              <div style="vertical-align: bottom; height: 160px;"><center><img src="/uploads/incentives/gadget/{{$ref->image }}"> </center></div>
                              <div style="color: #000; font-size: 12px;"> <center>{{$ref->title }}</center></div>
                                <div style="color: #000; font-size: 12px;"> <center>{{$ref->drp }}</center></div>
                              <a href=""><center><button type="button" class="btn btn-primary btn-sm">Avail Now</button></center></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                </div>
              </div>

            </div>

@endsection