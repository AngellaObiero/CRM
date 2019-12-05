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

                   <form role="form" method="POST" action="{{action('ClientController@update', $clients->id)}}">
                        @csrf

                        <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">

                                <label>Full Name/ Client Name</label>

                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $clients->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Phone Number</label>

                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $clients->phone  }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Email Address</label>

                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $clients->email  }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Date of birth</label>

                                <input type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $clients->dob  }}" required autofocus>

                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <label>Basic Information</label>

                                <textarea class="form-control{{ $errors->has('basicInfo') ? ' is-invalid' : '' }}" name="basicInfo" required autofocus> {{ $clients->basicInfo  }}</textarea>

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
@endsection
