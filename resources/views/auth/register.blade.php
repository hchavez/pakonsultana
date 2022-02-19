@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

              <iframe id="vidintro" height="455" src="https://www.youtube.com/embed/ffoGSjjQ0K4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="card-header" id="title">
    <strong><center>
      R &nbsp;&nbsp;  E &nbsp;&nbsp;  G &nbsp;&nbsp;  I &nbsp;&nbsp;  S &nbsp;&nbsp; T &nbsp;&nbsp;  R &nbsp;&nbsp;  A &nbsp;&nbsp;  T &nbsp;&nbsp;  I &nbsp;&nbsp;  O &nbsp;&nbsp;  N 
       <hr>
        Your Sponsor is <?php echo $data->firstname." ".$data->lastname; ?>
    </center></strong></div>

                <div class="card-body" id="formbody">
                  @if ($errors->any())    
                      <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  @endif
                 
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                        @csrf
                        
                        <input id="referral_id" name="referral_id" value="{{ $referral }}" type="hidden">
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                               <input id="firstname" type="text" placeholder="Full Name" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required  autofocus value="{{old('firstname')}}">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <!-- 
                            <div class="col-md-6">
                                <input id="lastname" type="text" placeholder="Last Name" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required autofocus value="{{old('lastname')}}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                  
                                     <input type="text" required class="form-control" name="username" aria-describedby="basic-addon3"  placeholder="User Name" required value="{{old('username')}}">
                                    
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                 <input id="email" placeholder="Email" type="Email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{old('email')}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6"> 
                              <input id="birthdate" type="date" placeholder="Birthdate (mm/dd/yyyy)" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" required value="{{old('birthdate')}}"> 
                                @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>
                            <div class="col-md-6">
                                <input id="contact" type="text" placeholder="Mobile" class="form-control @error('contact') is-invalid @enderror" name="contact" required value="{{old('contact')}}">
                                @error('contact') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> 
                            @enderror
                        </div>
                        </div>

                         <div class="form-group row">
                             <div class="col-md-12">
                                <input id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                             <div class="col-md-12">
                                <input id="travel_agency_name" type="text" placeholder="Travel Agency Name" class="form-control @error('travel_agency_name') is-invalid @enderror" name="travel_agency_name" value="{{old('travel_agency_name')}}">
                                @error('travel_agency_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                           <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{old('password')}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{old('password_confirmation')}}">
                            </div>
                        </div>
                        
                        <hr>
                            Select your Membership option:
                        <hr>
                        
                         <div class="form-group row">
                           <div class="col-md-6">
                                <select class="form-control" name="package_option" id="package_option" required>
                                  <option value="">Choose...</option>
                                  <option value="premium">Premium Package - P 2,500.00</option>
                                  <option value="vip">VIP Package - P 5,368.00</option>
                                </select>

                                @error('package_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <select class="form-control" name="payment_option" id="payment_option" required>
                                   <option value="">Choose...</option>
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
                        </div>  

                        <hr>
                        
                         <div class="form-group row" id="incentive">  
                           <div class="col-md-6">
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

                            <div class="col-md-6">
                              
                            </div>
                        </div> 

                        <div class="form-group row" id="prepackage">  
                           <div class="col-md-6">
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

                            <div class="col-md-6">
                              
                            </div>
                        </div> 

                        <div class="form-group row">
                            <div class="col-md-12" id="hidediv">
                                <div id="prepackageApic"> <br>
                                    <img src="/images/VIP PACKAGE A.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageBpic"> <br>
                                    <img src="/images/VIP PACKAGE B.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageCpic"> <br>
                                    <img src="/images/VIP PACKAGE C.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>

                                <div id="prepackageDpic"> <br>
                                    <img src="/images/VIP PACKAGE D.jpg" style="width: 90%; height: 95%; float: left; border: aliceblue; border-style: outset;">
                                </div>
                                </div>
                          </div>



                        <div class="form-group row">
                            <div class="col-md-12" id="hidediv">
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
                                
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Upload Receipt</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="payment_receipt" accept=".jpeg,.jpg" onchange="checkextension()">

                                 <!-- <input type="file" accept=".jpeg,.jpg" onchange="checkextension()" class="custom-file-input" id="payment_receipt" name="payment_receipt" aria-describedby="inputGroupFileAddon01" value="{{old('payment_receipt')}}" required> 
                                  <label class="custom-file-label" for="inputGroupFile01">Choosffe file</label>-->
                                </div>
                              </div>
                        <br><br>


                        <div class="form-group row mb-0" id="signupbtn">
                            <div class="col-md-12">
                                <center>

                                  <span data-is-not-yielded="true" class="join-form__form-body-agreement">By clicking Agree &amp; Sign Up, you agree to the eBiyahe Affiliate

                                     <a href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal">Terms and Condition.</a></span> <br><br>

                                    <button type="submit" id="regbtn" class="btn btn-primary" style="padding-left: 70px; padding-right: 70px;">
                                        {{ __('Agree & Sign Up') }}
                                    </button>
                                  </center>
                            </div>
                        </div>

                    



                    </form>
                </div>


            </div> <br>
           
        </div>
    </div>
</div>

<!-- Large modal -->
<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>A Terms and Conditions document for a website is an agreement that the website makes with its users which outlines how to use the site properly, as well as the obligations and responsibilities of each party. The parties in this document is the owner of the website and the site user. <br><br>

Most websites, especially commercial websites, have a portion of the site devoted to Terms and Conditions because it lets the site user know what it expected for them. It outlines what will happen in a variety of different possible situations including what happens if a user breaks the rules and must have their account terminated. <br><br>


The Terms and Conditions document also creates a legally binding set of rules for the parties. It's a place to set up the expectations for each of the parties to ensure that the website runs smoothly for the both of them. While it should be agreed upon by both parties, it is usually cannot be changed by the user so that if the the user uses the website, they agree to accept the terms and conditions of the website. However, if they don't agree to the the terms and conditions, then they should not use the website. <br><br>


This document is different from a Privacy Policy.

</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">

var site = window.location.href;
var ret = site.replace('http://ebiyaheaffiliate.com/register/','');

//document.getElementById('referral_id').value = ret;

        
        function checkextension() {
              var file = document.querySelector("#payment_receipt");
              if ( /\.(jpeg|jpg)$/i.test(file.files[0].name) === false ) { alert("File is not supported use .jpeg file"); }
        }

        $(document).ready(function(){

            $("#prepackage").attr("style", "display: none !important");
            $("#prepackageApic").attr("style", "display: none !important");
            $("#prepackageBpic").attr("style", "display: none !important");
            $("#prepackageCpic").attr("style", "display: none !important");
            $("#prepackageDpic").attr("style", "display: none !important");

            $("#online_silver").attr("style", "display: none !important");
            $("#online_gold").attr("style", "display: none !important");
            $("#bank_deposit").attr("style", "display: none !important");
            $("#remitance").attr("style", "display: none !important");
            
            $("#incentivehr").attr("style", "display: none !important");
            $("#incentive").attr("style", "display: none !important");
            $("#package").attr("style", "display: none !important");

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

                if(pick == 'online' && packageval == 'premium'){
                      $("#online_silver").attr("style", "display: inline !important");
                    
                    $("#online_gold").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                    $("#remitance").attr("style", "display: none !important");
                }

                if(pick == 'online' && packageval == 'vip'){
                      $("#online_gold").attr("style", "display: inline !important");
                     $("#online_silver").attr("style", "display: none !important");
                    $("#bank_deposit").attr("style", "display: none !important");
                    $("#remitance").attr("style", "display: none !important");
                }

          
            });


            $("#package_option").change(function () {
                var package_option = this.value;

                if(package_option == 'vip'){
                   $("#incentivehr").attr("style", "display: inline !important");
                   $("#incentive").attr("style", "display: inline !important");
                   $("#prepackage").attr("style", "display: inline !important");
                }

                if(package_option == 'premium'){
                    $("#incentivehr").attr("style", "display: none !important");
                    $("#incentive").attr("style", "display: none !important");
                    $("#package").attr("style", "display: none !important");
                    $("#prepackage").attr("style", "display: none !important");

                    $("#prepackageApic").attr("style", "display: none !important");
                    $("#prepackageBpic").attr("style", "display: none !important");
                    $("#prepackageCpic").attr("style", "display: none !important");
                    $("#prepackageDpic").attr("style", "display: none !important");
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
