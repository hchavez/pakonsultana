@extends('layouts.user2')



@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold">Register New Patient</h4> 
                 <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0" style="font-size: 12px !important;">   <i class="mdi mdi-calendar"></i> <?php echo date("l"); ?> (<?php echo date("F d Y h:i:sa"); ?> )
                  </div>
                 </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <form method="POST" action="add">
                        @csrf  
                        <p class="card-description">
                          Personal info
                        </p> 
              
                          @if(session('success'))
                          <div class="alert alert-success">{{session('success')}}</div>
                          @endif

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Physician</label>
                                <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="physician" id="physician3" value="3" required>
                                      Dra. Chavez
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="physician" id="physician4" value="4" required>
                                      Dr. Viajedor
                                    <i class="input-helper"></i></label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contact No</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="contactno" required>
                                </div>
                              </div>
                            </div>
                          </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">First Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Last Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" required>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Middle Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="middlename">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Name (JR., ETC)</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="extname">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Age</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="age" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Civil Status</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="civilstatus" required>
                              </div>
                            </div>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Gender</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="gender" required>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Date of Birth</label>
                              <div class="col-sm-9">
                                <input class="form-control" placeholder="dd/mm/yyyy" name="birthdate" required>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Citizenship</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="citizenship">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Religion</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="religion">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Philhealth</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="philhealth">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Insurance</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="insurance">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Address</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" required name="address">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Town</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" required name="town">
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>


                      </form>
                    </div>
                    </div>
                  </div>
                </div>




            </div>
          </div>
</div>
      
<script>
        $(document).ready( function () {
          
        });
</script>
  
@endsection



    