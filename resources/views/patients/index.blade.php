@extends('layouts.user2')



@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold">Patient List <a href="{{ url('patients/create') }}"><button class="btn btn-primary btn-sm">Add</button></a></h4> 
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
                      <div class="row">
                        <div class="col-12">
                        
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                    <table class="table" id="allpatients">
                                        <thead>
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($patients as $patient)
                                          <tr>
                                                <td><a href="{{ route('patients.show', $patient->id) }}" class="btn btn-warning btn-sm">{{ $patient->firstname }}</a></td>
                                                <td>{{ $patient->lastname }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td><a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                                <td>View</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
                          
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>


               
               


            </div>
          </div>
</div>
      <script>
        $(document).ready( function () {
            $('#allpatients').DataTable();
        });
    </script>
  
@endsection



    