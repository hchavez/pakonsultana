@extends('layouts.user')

@section('content')

   
          <!-- Page Heading -->
        <div class="row">

          <div class="col-xl-12 col-lg-12">

              <!-- Area Chart -->
            <div class="card shadow mb-8">
                <div class="card-header py-4">
                  <h6 class="m-0 font-weight-bold text-primary">Earning - Share your Referral link and earn money.</h6>
                </div>
                <div class="card-body">
                  http://ebiyaheaffiliate.com/register/{{ Auth::user()->username }}
                  <hr>

                
                  

                    <div class="btn btn-primary btn-icon-split" data-href="http://ebiyaheaffiliate.com/register/choi" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Febiyaheaffiliate.com%2Fregister%2F{{ Auth::user()->username }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">  <span class="icon text-white-50">
                     <i class="fab fa-facebook-square"></i> 
                    </span>
                    <span class="text" style="color: white !important;">Share on Facebook</span></a></div>

                

                  <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                     <i class="fab fa-facebook-messenger"></i> 
                    </span>
                    <span class="text">Share on Messenger</span>
                  </a>

                </div>
              </div>
              <br>

        
           </div>

            <!-- Donut Chart -->

             <div class="col-xl-12 col-lg-12">

                     <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                       <div class="main-content"> 
                          <table class="table table-striped table-bordered table-hover" id="referrdals_list">
                          <thead>
                               <tr>
                                  <th>Username</th>
                                  <th>Name</th>
                                  <th>Contact</th>
                                  <th>Membership Type</th>
                                  <th>Travel Agency Name</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($referrals as $key => $ref)
                              <tr>
                                  <td>{{$ref->username }}</td>
                                  <td class="text-capitalize"> {{ $ref->firstname }} {{ $ref->lastname }}</td>
                                  <td>{{ $ref->contact }}</td>
                                  <td class="text-uppercase">{{ $ref->role }}</td>
                                  <td>{{ $ref->travel_agency_name }}</td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table> 
                    </div>
                 
                </div>
              </div>


            </div>
            
            
          </div>



<script type="text/javascript">
$(document).ready(function(){
  $('#referrals_list').DataTable();
});
</script>

@endsection

