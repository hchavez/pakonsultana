@extends('layouts.user')

@section('content')



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">MW My Profile Settings</h1>
</div>

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
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-bottom: 30px;">
                    </div>

                    <div class="col-sm-9">
                        <h3 class="text-capitalize">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
                        ID Number: 000{{ Auth::user()->id }}<br>
                        <span class="text-uppercase"> {{Auth::user()->role }} </span>
                        <i class="fas fa-award fa-2x" <?php if (Auth::user()->role == 'premium') { ?> style="color:#C0C0C0 !important; " <?php } else { ?> style="color:#D4AF37 !important; "  <?php } ?>>  </i> 
                    </div>
                </div>

                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Membership Type: <span class="text-uppercase"> {{Auth::user()->role }} </span> <i class="fas fa-award fa-1.5x" <?php if (Auth::user()->role == 'premium') { ?> style="color:#C0C0C0 !important; " <?php } else { ?> style="color:#D4AF37 !important; "  <?php } ?>>  </i> </h6> 

            </div>
            <!-- Card Header - Dropdown -->
            <?php if (Auth::user()->role == 'premium') { ?>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a href="login.html" class="btn btn-google btn-user btn-block">
                    Upgrade Membership
                </a> 

            </div>
            <? } ?>

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <a href="login.html" class="btn btn-primary btn-user btn-block">
                    Proof of Payment Here!
                </a>
            </div>
            <!-- Card Body -->

        </div>
    </div>





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

                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
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

@endsection