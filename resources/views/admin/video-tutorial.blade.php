@extends('layouts.admin')

@section('content')

<div class="col-xl-12 col-lg-12">
    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Video Tutorials</h6>
        </div>
        <div class="card-body">       

            <div id="exTab2" class=""> 
                @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                      
                        <table id="videostable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Video</th>
                                    <th>Title</th>
                               
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($video_tutorials as $key => $data)
                                <tr>
                                    <td style="width: 320px;">
                                    
                                       <div class="embed-responsive embed-responsive-16by9">
                                        <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="//{{ $data->link }}" allowfullscreen></iframe>
                                      </div>
                                      
                                    </td>

                                    <td>{{ $data->title }} </td>
                                    <td> 
                                        <!--a href="{{ url('admin/incentive-settings') }}/{{ $data->id }}/?type=gadget">
                                            <button type="button" class="btn btn-success btn-sm">Update</button> 
                                        </a-->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#video-{{$data->id }}">Update</button>
                                        <a href="{{ url('admin/videos-delete') }}/{{ $data->id }}">
                                            <button type="button" class="btn btn-warning btn-sm">Delete</button> 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!--a href="{{ url('admin/incentive-settings-add?type=gadget') }}"><button type="button" class="btn btn-primary btn-xs" id="createNewProduct">Add New Gadget</button></a-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvideo">Add Video Tutorial</button>


                    </div>
                    
                
                </div>
              </div>

              <!-- Modal add gadget-->
                <div class="modal fade" id="addvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Video Tutorial Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('videos-add') }}">
                        @csrf                
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Url</label>
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" required  autofocus>
                        </div>

                         <input id="category" type="hidden" name="category" value="tutorial" >   

                       <input id="status" type="hidden" name="status" value="1">         

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  

                    </div>
                  </div>
                </div>               
              <!-- modal -->

               <!-- Modal update gadget-->
              @foreach($video_tutorials as $key => $data)
                <div class="modal fade" id="video-{{$data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Video Details: {{$data->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="{{ route('videos') }}">
                        @csrf                
                        
                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                   
                        <input value="{{ $data->id }}" type="hidden" name="id">
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input id="title" type="text" value="{{ $data->title }}" class="form-control @error('title') is-invalid @enderror" name="title" required  autofocus>
                        </div>
                        
                         <div class="form-group">
                            <label for="exampleInputEmail1">Url</label>
                            <input id="link" type="text" value="{{ $data->link }}" class="form-control @error('link') is-invalid @enderror" name="link" required  autofocus>
                        </div>      

                         <button type="submit" class="btn btn-primary">Submit</button>
                        </form>  
                    </div>
                  </div>
                </div>
                @endforeach
              <!-- modal -->

              
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $('#videostable').DataTable( {
    responsive: true
} );


});
</script>


@endsection
<style type="text/css">

.modal-content{padding:0 1em;}
.container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  border: none;
}
</style>