@extends('layouts.user')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Profile Settings</h1>
</div>

    @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif

<!-- Page Heading -->
<div class="row">

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Profile Photo</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <img src="/uploads/avatars/<?php if(Auth::user()->avatar){ echo Auth::user()->avatar; }else{ echo 'noavatar.jpg'; } ?>" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-bottom: 30px;">

                    </div>

                    <div class="col-sm-9">
                        <h3 class="text-capitalize">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
                        ID Number: 000{{ Auth::user()->id }}<br>
                        <span class="text-uppercase"> {{Auth::user()->role }} </span>
                        <i class="fas fa-award fa-2x" <?php if (Auth::user()->role == 'premium') { ?> style="color:#C0C0C0 !important; " <?php } else { ?> style="color:#D4AF37 !important; "  <?php } ?>>  </i> 
                    </div>
                </div>

                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <input type="file" name="avatar" accept=".jpeg,.jpg" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Membership Type: <span class="text-uppercase"> {{Auth::user()->role }} </span> </h6> 

            </div> 

             <div class="card-header flex-row align-items-center">
                <center>
                <span class="text-uppercase"> </span> <i class="fas fa-award fa-6x" <?php if (Auth::user()->role == 'premium') { ?> style="color:#C0C0C0 !important; " <?php } else { ?> style="color:#D4AF37 !important; "  <?php } ?>>  </i>
                </center> 
            </div>
            <!-- Card Header - Dropdown -->
            <?php if (Auth::user()->role == 'premium') { ?>
            <div class="card-header flex-row align-items-center justify-content-between">
                <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upgradetovip">Upgrade Membership</button>
                </center>

            </div>
            <?php } ?>

          
            <!-- Card Body -->

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sponsor: <span class="text-uppercase">{{ $sponsor->username}} </span> </h6> 

            </div> 

             <div class="card-header flex-row align-items-center">
                <center> 
                <img src="/uploads/avatars/<?php if( $sponsor->avatar){ echo $sponsor->avatar; }else{ echo 'noavatar.jpg'; } ?>" style="width:150px; height:150px; border-radius:50%; margin-right:25px; margin-bottom: 30px;">

                </center> 
            </div>
    
        </div>

    </div>


     



     <!-- Modal Upgrade account-->
                <div class="modal fade" id="upgradetovip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upgrade Account to VIP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('upgrade-vip') }}" enctype="multipart/form-data" style="
    padding: 20px;
">
                        @csrf                
                        
                        
                        <input type="hidden" value="vip" name="type">
                        <input type="hidden" value="{{Auth::user()->id }}" name="user_id">
                      
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount: P 2,870.00</label>
                        </div>

                        <div class="form-group" id="prepackage">  
                          
                                <select class="form-control" name="prepackage_option" id="prepackage_option">
                                  <option value="">Select Your FREE-Package</option>
                                  <option value="FREE Package A">Package A</option>
                                  <option value="FREE Package B">Package B</option>
                                  <option value="FREE Package C">Package C</option>
                                  <option value="FREE Package D">Package D</option>
                                </select>

                                @error('package')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          

                         
                        </div> 

                        <div class="form-group row">
                            <div class="col-md-12" id="hidediv">
                                <div id="prepackageApic"> <br>
                                    <img src="/images/UPGRADE PACKAGE A.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageBpic"> <br>
                                    <img src="/images/UPGRADE PACKAGE B.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageCpic"> <br>
                                    <img src="/images/UPGRADE PACKAGE C.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageDpic"> <br>
                                    <img src="/images/UPGRADE PACKAGE D.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>
                                </div>
                          </div>

                       <div class="form-group">
                                <select class="form-control" name="payment_option" id="payment_option">
                                   <option>Choose...</option>
                                  <option value="online">Online Payment</option>
                                  <option value="bank_deposit">Bank Deposit</option>
                                  <option value="remitance">Any Remitance</option>
                                </select>
                            @error('payment_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>

                             <div class="form-group">
                                  <select class="form-control" name="incentive_option" id="incentive_option">
                                  <option value="">Select incentive option</option>
                                  <option value="gadget">Gadget</option>
                                  <option value="travel">Travel</option>
                                  <option value="car">Car</option>
                                </select>
                            @error('incentive_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        

                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="online_silver"> Click below to pay online and screenshot your payment confirmation receipt to upload: <br>
                                    <a href="https://www.paypal.com/webapps/hermes?token=5481043120415492F&useraction=commit&mfid=1585585126898_35430053e1529" target="_blank"><img src="/images/paypal.png" style="width: 165px; height: 80px; float: left;  margin-right: 25px; border: aliceblue; border-style: outset;"></a>
                                </div>
                                <div id="online_gold">Click below to pay online and screenshot your payment confirmation receipt to upload: <br>
                                    <a href="https://www.paypal.com/webapps/hermes?token=87N49416HU625002X&useraction=commit&mfid=1585585263310_e080ea24db297" target="_blank"><img src="/images/paypal.png" style="width: 165px; height: 80px; float: left;  margin-right: 25px; border: aliceblue; border-style: outset;"></a>
                                </div>
                                <p id="bank_deposit">
                                    <img src="/images/bdo.png" style="width: 165px; height: 110px; float: left;  margin-right: 25px;">
                                    <br> 
                                    EBIYAHE SERVICES CO. <br> 
                                    ACCOUNT NO.: 003440347871 <br> 
                                    BDO ACCNT NAME:(SAVINGS) <br> <br> 
                                    <img src="/images/bpi.png" style="width: 170px; height: 100px; float: left;  margin-right: 25px;">
                                    <br> 
                                    EBIYAHE SERVICES CO. <br> 
                                    BPI ACCNT NO.: 9941-0005-14 <br> 
                                    BPI ACCNT NAME: (CURRENT) <br> 
                                </p>
                                 <p id="remitance">
                                     <strong> ANY REMITTANCE </strong> <br> 
                                     EBIYAHE SERVICES CO. <br> 
                                     JASON GENERAL <br> 
                                     09773311338 <br> 
                                      CEBU CITY <br> 
                                       </p>
                                   </div>
                               </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload Payment Receipt</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  autofocus>
                        </div>                

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->



    <div class="col-xl-12 col-lg-12">


        <!-- Bar Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Personal Details</h6>
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

            



                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-2">

                            <form method="post" action="{{ route('update-profile', Auth::user()->id) }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" value="{{ Auth::user()->firstname }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" value="{{ Auth::user()->lastname }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="contact" class="form-control form-control-user" placeholder="Contact" value="{{ Auth::user()->contact }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="birthdate" class="form-control form-control-user" placeholder="Date of Birth" value="{{ Auth::user()->birthdate }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="zipcode" class="form-control form-control-user" placeholder="Zip Code" value="{{ Auth::user()->zipcode }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="username" value="{{ Auth::user()->username }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="travel_agency_name" class="form-control form-control-user" placeholder="Travel Agency Name" value="{{ Auth::user()->travel_agency_name }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="address" placeholder="Address" value="{{ Auth::user()->address }}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="New Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat New Password">
                                    </div>
                                </div>

                                <hr>

                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Donut Chart -->

</div>

<script type="text/javascript">
        
            function checkextension() {
              var file = document.querySelector("#payment_receipt");
              if ( /\.(jpeg|png|jpg)$/i.test(file.files[0].name) === false ) { alert("File is not supported use .jpeg file"); }
            }

        $(document).ready(function(){
            
             //$("#hidediv").hide();

            $("#online_silver").attr("style", "display: none !important");
            $("#online_gold").attr("style", "display: none !important");
            $("#bank_deposit").attr("style", "display: none !important");
            $("#remitance").attr("style", "display: none !important");


            $("#prepackageApic").attr("style", "display: none !important");
            $("#prepackageBpic").attr("style", "display: none !important");
            $("#prepackageCpic").attr("style", "display: none !important");
            $("#prepackageDpic").attr("style", "display: none !important");

            $("#payment_option").change(function () {
                var pick = this.value;
                var firstDropVal = $('#pick').val();
                var packageval = $('select#package_option option:selected').val();

                if(pick == 'bank_deposit'){
                      $("#bank_deposit").attr("style", "display: inline !important");
                        $("#online_silver").attr("style", "display: none !important");
                        $("#online_gold").attr("style", "display: none !important");
                        $("#remitance").attr("style", "display: none !important");
                }

                if(pick == 'remitance'){
                      $("#remitance").attr("style", "display: inline !important");
                    $("#online_silver").attr("style", "display: none !important");
                    $("#online_gold").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                }


                if(pick == 'online'){
                      $("#online_gold").attr("style", "display: inline !important");
                     $("#online_silver").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                    $("#remitance").attr("style", "display: none !important");
                }

               
            });

            $("#prepackage_option").change(function () {
                var prepackage_option = this.value;

                if(prepackage_option == 'Pre Package A'){
                   $("#prepackageApic").attr("style", "display: inline !important");
                   $("#prepackageBpic").attr("style", "display: none !important");
                   $("#prepackageCpic").attr("style", "display: none !important");
                   $("#prepackageDpic").attr("style", "display: none !important");
                }
                if(prepackage_option == 'Pre Package B'){
                   $("#prepackageBpic").attr("style", "display: inline !important");
                   $("#prepackageApic").attr("style", "display: none !important");
                   $("#prepackageCpic").attr("style", "display: none !important");
                   $("#prepackageDpic").attr("style", "display: none !important");
                }
                if(prepackage_option == 'Pre Package C'){
                   $("#prepackageCpic").attr("style", "display: inline !important");
                   $("#prepackageBpic").attr("style", "display: none !important");
                   $("#prepackageApic").attr("style", "display: none !important");
                   $("#prepackageDpic").attr("style", "display: none !important");
                }
                if(prepackage_option == 'Pre Package D'){
                   $("#prepackageDpic").attr("style", "display: inline !important");
                   $("#prepackageBpic").attr("style", "display: none !important");
                   $("#prepackageCpic").attr("style", "display: none !important");
                   $("#prepackageApic").attr("style", "display: none !important");
                }

        
            });
        });

</script>

@endsection