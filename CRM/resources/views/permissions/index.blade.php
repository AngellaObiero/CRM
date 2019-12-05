@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- jquery -->


<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>

<!-- bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection
@section('content')
@if (Gate::allows('permission','view-permissions'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
          @if (Gate::allows('permission','add-permissions'))
          <button id="create_button" type="button" class="btn btn-primary"><i class="far fa-create"></i>Create new permission</button>
          @endif
          <hr></hr>
          <!-- table -->
          <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Description</th>
                      @if (Gate::allows('permission','edit-permissions'))
                      <th>Action</th>
                      @endif
                  </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                  <tr>
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->description}}</td>
                      @if (Gate::allows('permission','edit-permissions'))
                      <td>
                        <span>

                          <button id="edit_button" type="button" name="{{$permission->id}}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i>Edit</button>

                          <form class="" action="{{url('/permission/delete/'.$permission->id)}}" method="post">
                              @csrf
                              <button type="submit" name="button" class="btn btn-danger btn-sm"><i class="far fa-delete"></i>Delete</button>
                          </form>
                          </span>
                      </td>
                      @endif
                  </tr>
                  @endforeach
              </tbody>
          </table>
          <!-- modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModal">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                          <p class="modal-body-content"></p>
                      </div>


                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endif
@endsection
@section('scripts')


<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
    $('#create_button').on('click',function(){
      var settings = {
      "async": true,
      "crossDomain": true,
      "url": "{{url('/permission/create')}}",
      "method": "GET",
      "headers": {
        "cache-control": "no-cache",
        "Postman-Token": "354b3b16-4362-4bde-bded-bbeb7d1b8aa4"
      }
    }

    $.ajax(settings).done(function (response) {
      console.log(response);
      $('.modal-body-content').html("<div id='modal-body-content'>"+response+"</div>");
      $('#myModal').modal();
      $('.modal-title').text('Create permission');

    });
  });

 $('#myTable').on('click',"#edit_button",function(){
      var settings = {
      "async": true,
      "crossDomain": true,
      "url": "{{url('/permission/edit/')}}"+$(this).attr('name'),
      "method": "GET",
      "headers": {
        "cache-control": "no-cache",
        "Postman-Token": "354b3b16-4362-4bde-bded-bbeb7d1b8aa4"
      }
    }

    $.ajax(settings).done(function (response) {
      console.log(response);
      $('.modal-body-content').html("<div id='modal-body-content'>"+response+"</div>");
      $('#myModal').modal();
      $('.modal-title').text('Edit permission');

    });
  });



  $('#myModal').on('shown.bs.modal', function () {

    // $('#myInput').trigger('focus')
  });


} );

// $('#myModal').modal()


</script>

<!-- datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
@endsection
