@extends('layouts.user')

@section('content')



		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
          </div>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">My Wallet</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ number_format(Auth::user()->wallet, 2, '.', ',') }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-3x text-gray-300"></i>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-success text-uppercase mb-1">Pending Payout</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ number_format($pending, 2, '.', ',') }}</div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-sync fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-info text-uppercase mb-1">Total Payout</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₱ {{ number_format($payout, 2, '.', ',') }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-wallet fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-warning text-uppercase mb-1">My Payment Method</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                    </div>
                    <div class="col-auto">
                       <i class="fas fa-money-check fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
          <!-- Page Heading -->
          <div class="row">


            <div class="col-xl-12 col-lg-12">

                     <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                       <div class="main-content"> 
                          <table class="table table-striped table-bordered table-hover" id="referrals_list">
                          <thead>
                              <tr>
                                  <th>ID No</th>
                                  <th>Date</th>
                                  <th>Payment Method</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($encashments as $key => $ref)
                              <tr>
                                  <td>{{$ref->id }}</td>
                                  <td class="text-capitalize"> {{ \Carbon\Carbon::parse($ref->created_at)->format('d/m/Y')}}
 </td>
                                  <td>{{ $ref->method }}</td>
                                  <td class="text-uppercase">₱ {{ number_format($ref->amount, 2, '.', ',') }}</td>
                                  <td><?php if($ref->status == '1') { ?> <button type="button" class="btn btn-success">PAID</button> <?php }else{ ?> <button type="button" class="btn btn-warning">PENDING</button> <?php }  ?></td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table> 
                    </div>
                 
                </div>
              </div>


            </div>

            <!-- Donut Chart -->
            
          </div>

   
@endsection