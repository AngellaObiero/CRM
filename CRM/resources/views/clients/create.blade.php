@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <a href="{{url('/home')}}" class="float-right btn-link">All clients</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                </div>

                   <form role="form" method="POST" action="{{url('/clients')}}" enctype="multipart/form-data">
                        @csrf


                            <label>Profile picture</label>

                            <input type="file" class="" name="profpic" value="" required>




                      

                            <div class="form-group">

                                <label>Full Name/ Client Name</label>

                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Phone Number</label>

                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Email Address</label>

                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Date of birth</label>

                                <input type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Basic Information</label>

                                <textarea class="form-control{{ $errors->has('basicInfo') ? ' is-invalid' : '' }}" name="basicInfo" required autofocus> {{ old('basicInfo') }}</textarea>

                                @if ($errors->has('basicInfo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('basicInfo') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success mt-4"> {{ __('Submit') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#blah')
                      .attr('src', e.target.result)
                      .width(150)
                      .height(200);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
</script>
@endsection
