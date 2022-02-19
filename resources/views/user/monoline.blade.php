@extends('layouts.user')

@section('content')


<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Monoline</h1>

          </div>


    <div class="row">



            <div class="col-xl-12 col-lg-12">
        
              <!-- Bar Chart -->
              <div class="card shadow mb-12">

                <div class="card-body">
                       <div class="main-content"> 

                        <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Your Direct Downlines </h6> 

                              </div> 

                               <div class="card-header flex-row align-items-center">
                                  <center> 
                                @inject('avatar', 'App\Http\Controllers\UserController')
                                                      

                                                    <!-------------------------------------------->

                                                    <!--
                                                        We will create a family tree using just CSS(3)
                                                        The markup will be simple nested lists
                                                        -->
                                                        <div class="tree">
                                                          <ul>
                                                            <li>
                                                              <a href="#">
                                                                  
                                                <img class="img-profile rounded-circle" src="uploads/avatars/<?php if(Auth::user()->avatar){ echo Auth::user()->avatar; }else{ echo 'noavatar.jpg'; } ?>" style="width: 60px; height: 60px;"><br>
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>

                                                              </a>
                                                              <ul>
                                                                  <ul>
                                                                     @foreach($referral_one as $key => $ref)
                                                                   
                                                                       

                                                                            <li> <a href="{{ url('/downline') }}/{{ $ref->id }}">

                                                                            <img class="img-profile rounded-circle" src="/uploads/avatars/{{ $ref->avatar }}" style="width: 60px; height: 60px;"><br>
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $ref->firstname}} {{ $ref->lastname }}</span>

                                                                          </a>
                                                                          </li>

                                                                              
                                                                          

                                                                     @endforeach
                                                                  
                                                                  </ul>
                                                            </li>
                                                          </ul>
                                                        </div>
                                  </center> 
                              </div>
                      
                          </div>


                          <center>


                      </center>
                        </div>
                 
                </div>
              </div>
    
            </div>
    
            <!-- Donut Chart -->
            
          </div>


  <style type="text/css">
    
    /*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
  padding-top: 20px; position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
  background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
  border-color:  #94a0b4;
}

/*Thats all. I hope you enjoyed it.
Thanks :)*/

  </style>
          

       

@endsection