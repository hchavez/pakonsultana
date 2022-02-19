@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">VIDEO PRESENTATION</h6>
            <a href="{{ url('admin/video-presentation-add') }}"><button class="btn btn-primary btn-sm">Add Video </button></a>
        </div>
        <div class="card-body">
            <div class="main-content"> 
                <table class="table table-striped table-bordered table-hover" id="referrals_list">
                    <thead>
                        <tr>
                            <th>ID No</th>
                            <th>Date</th>
                            <th>Video</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $data as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td> {{ $value->created_at }} </td>
                                <td>{{ $value->video_link }}</td>
                                <td>{{ $value->amount }}</td>                                
                                <td>
                                    <a href="{{ url('admin/video-presentation') }}/{{ $value->id }}"><button class="btn btn-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/video-presentation-delete') }}/{{ $value->id }}"><button class="btn btn-danger btn-sm">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>

@endsection