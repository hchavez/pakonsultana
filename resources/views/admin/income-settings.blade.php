@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">INCENTIVE SETTINGS</h6>
        </div>
        <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                      <h6 class="m-0 font-weight-bold ">Site Settings</h6> <br>
                        <form method="POST" action="{{ route('update-site-settings') }}">
                        @csrf
                        
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                       <input value="{{ $all_settings['id'] }}" type="hidden" name="id">
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Name</label>
                            <input id="site_name" value="{{ $all_settings['site_name'] }}" type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Currency Symbol</label>
                            <input id="currency_symbol" value="{{ $all_settings['currency_symbol'] }}" type="text" class="form-control @error('currency_symbol') is-invalid @enderror" name="currency_symbol" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Limit Withdrawal</label>
                            <input id="limit_withdraw" value="{{ $all_settings['limit_withdraw'] }}" type="number" class="form-control @error('limit_withdraw') is-invalid @enderror" name="limit_withdraw" required  autofocus>
                        </div>                     
                                
                         <div class="form-group">
                            <label for="exampleInputEmail1">Minimum Withdrawal</label>
                            <input id="min_withdraw" value="{{ $all_settings['min_withdraw'] }}" type="number" class="form-control @error('min_withdraw') is-invalid @enderror" name="min_withdraw" required  autofocus>
                        </div>        
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Premium Package</label>
                            <input id="premium_package" value="{{ $all_settings['premium_package'] }}" type="number" class="form-control @error('premium_package') is-invalid @enderror" name="premium_package" required  autofocus>
                        </div>  

                         <div class="form-group">
                            <label for="exampleInputEmail1">VIP Package</label>
                            <input id="vip_package" value="{{ $all_settings['vip_package'] }}" type="number" class="form-control @error('vip_package') is-invalid @enderror" name="vip_package" required  autofocus>
                        </div>          
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Premium Referral</label>
                            <input id="premium_referral" value="{{ $all_settings['premium_referral'] }}" type="number" class="form-control @error('premium_referral') is-invalid @enderror" name="premium_referral" required  autofocus>
                        </div>    
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">VIP Referral</label>
                            <input id="vip_referral" value="{{ $all_settings['vip_referral'] }}" type="number" class="form-control @error('vip_referral') is-invalid @enderror" name="vip_referral" required  autofocus>
                        </div>    
                         
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                  </div>
                  <div class="col-sm">
                      <h6 class="m-0 font-weight-bold ">Premium Indirect Referral</h6> <br>
                      <form method="POST" action="{{ route('update-premium-referral') }}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 1</label>
                            <input id="premium_level1_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level1_ref" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 2</label>
                            <input id="premium_level2_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level2_ref" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 3</label>
                            <input id="premium_level3_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level3_ref" required  autofocus>
                        </div>                     
                                
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 4</label>
                            <input id="premium_level4_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level4_ref" required  autofocus>
                        </div>        
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 5</label>
                            <input id="premium_level5_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level5_ref" required  autofocus>
                        </div>  

                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 6</label>
                            <input id="premium_level6_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level6_ref" required  autofocus>
                        </div>          
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 7</label>
                            <input id="premium_level7_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level7_ref" required  autofocus>
                        </div>    
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 8</label>
                            <input id="premium_level8_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level8_ref" required  autofocus>
                        </div>    
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 9</label>
                            <input id="premium_level9_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level9_ref" required  autofocus>
                        </div>   
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 10</label>
                            <input id="premium_level10_ref" type="number" class="form-control @error('premium_level1_ref') is-invalid @enderror" name="premium_level10_ref" required  autofocus>
                        </div>   
                         
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                      
                  </div>
                  <div class="col-sm">
                      <h6 class="m-0 font-weight-bold">VIP Indirect Referral</h6> <br>
                      <form method="POST" action="{{ route('update-vip-referral') }}">
                        @csrf

                       <div class="form-group">
                            <label for="exampleInputEmail1">Level 1</label>
                            <input id="vip_level1_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level1_ref" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 2</label>
                            <input id="vip_level2_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level2_ref" required  autofocus>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 3</label>
                            <input id="vip_level3_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level3_ref" required  autofocus>
                        </div>                     
                                
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 4</label>
                            <input id="vip_level4_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level4_ref" required  autofocus>
                        </div>        
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 5</label>
                            <input id="vip_level5_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level5_ref" required  autofocus>
                        </div>  

                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 6</label>
                            <input id="vip_level6_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level6_ref" required  autofocus>
                        </div>          
                             
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 7</label>
                            <input id="vip_level7_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level7_ref" required  autofocus>
                        </div>    
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Level 8</label>
                            <input id="vip_level8_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level8_ref" required  autofocus>
                        </div>    
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 9</label>
                            <input id="vip_level9_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level9_ref" required  autofocus>
                        </div>   
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level 10</label>
                            <input id="vip_level10_ref" type="number" class="form-control @error('vip_level1_ref') is-invalid @enderror" name="vip_level10_ref" required  autofocus>
                        </div>  
                         
                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                  </div>
                </div>
        
        </div>
    </div>
</div>

@endsection