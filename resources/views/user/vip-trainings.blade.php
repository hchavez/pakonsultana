@extends('layouts.user')

@section('content')



   
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">VIP Training Toturials</h1>

</div>

<!-- Content Row -->
<div class="row">

  


</div>


           
           
              <ul> 
                @foreach($data as $key => $ref)<li>
                 <a href="#myModal-{{$ref->id }}" data-toggle="modal">{{$ref->title }}</a></li>
                 @endforeach
              </ul>
                
              <!-- modal -->
 @foreach($data as $key => $ref)

<div class="m-4">
    <!-- Button HTML (to Trigger Modal) -->
   
    
    <!-- Modal HTML -->
    <div id="myModal-{{$ref->id }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$ref->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="//{{ $ref->link }}" allowfullscreen></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endforeach

 @foreach($data as $key => $ref)
<script>  
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    var id = <?php echo $ref->id; ?>;

    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal-"+id).on('hide.bs.modal', function(){
            $iframe = $(this).find("iframe");
            $iframe.attr("src", $iframe.attr("src"));
           $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal-"+id).on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
});
</script>
@endforeach

@endsection