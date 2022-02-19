@extends('layouts.user')

@section('content')




   
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Incentives</h1>
          </div>
          <div class="row">

      
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

           
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>

                  <div class="card-body">
                	<div class="row">
					     
						<div class="col-lg-12 align-items-center">
									           
								<center><img src="/images/incentives.png"></center>
								        <p>
								        	NOTE: You may choose to avail either the  Gadget incentive, Travel incentive or Dream car incentive. Please be reminded that once you have enrolled your account to your chosen incentive, it will be considered final.

								        </p>									            
					          </div>
					        </div>
                </div>
              </div>

            </div>

@endsection