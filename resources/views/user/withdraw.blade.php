@extends('layouts.user')

@section('content')

<?php date_default_timezone_set('Asia/Manila'); ?>

		  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Withdrawals</h1>
          </div>
   
          <!-- Page Heading -->
          <div class="row">
            
               <div class="col-xl-12 col-lg-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Current Balance:₱ {{ number_format(Auth::user()->wallet, 2, '.', ',') }}</h6>
                </div>

                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif

          @if(session('success'))
               <div class="alert alert-success">{{session('success')}}</div>
          @endif



                  <div class="row">
                   <div class="col-lg-12">
                      <div class="p-2">
      
                      <form method="post" action="{{ route('encash', Auth::user()->id) }}">
                               @csrf
                                  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                       <input type="hidden" id="wallet" name="wallet" value="{{Auth::user()->wallet}}">
                                      <input type="text" name="amount" required="required" class="form-control form-control-user" id="amount" placeholder="Amount to Encash" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="method" id="method">
                                                <!-- <option selected>Choose...</option> -->
                                                <option value="cheque">CHEQUE</option>
                                              </select>
                                    </div>
                                  </div>

                                  <hr>
                                <?php if(date('D') === 'Tue') {?>
                                   <button type="submit" class="btn btn-primary" <?php if(Auth::user()->wallet < 1000){ ?> disabled="disabled" <?php } ?>>ENCASH</button>
                                <?php }else{ ?>
                                   <p style="color: red;"> Payout every Tuesday of the Week </p>
                                 <?php } ?>
                  </form>                   
              </div>
              </div>
          </div>
                </div>
              </div

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



<script type="text/javascript">
  

        $(document).ready(function(){

            $("#amount").change(function () {
     
                var wallet = $('#wallet').val();
                var amount = $('#amount').val();
           

                if(amount > wallet){
                       alert('You dont have enough amount on your wallet. ');
                }

          
            });


        });

</script>   
@endsection