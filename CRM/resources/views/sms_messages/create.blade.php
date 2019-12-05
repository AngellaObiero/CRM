@extends("layouts.app")
@section("content")
<div class="container">


<form class="" action="{{url('send_sms')}}" method="post">
  @csrf
    <div class="form-group">

  <label for="client_id">Select clients</label>
              <select style="width: 100%;" id="client_id" name="client_id[]" multiple>
                @foreach (\App\Client::all() as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
              </select>
  <label for="client_id">Enter text message</label>
          <textarea name="message"  class="form-control"></textarea>

  <button type="submit" name="button">Send</button>
</div>
</form>
</div>
@endsection
@section("header")
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script src="js/jquery.ccpicker.js" type="text/javascript"></script>
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.11/js/select2.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {
  // $('#department_id').select2();
  $('#client_id').select2({
    width: 'resolve' // need to override the changed default
});

});
</script>

@endsection
