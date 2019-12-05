@extends("layouts.app")
@section("content")

<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Sms messages</h4>
                  <p class="card-category">Messages sent to clients</p>
                  <a href="{{url('clients/create')}}"><i class="material-icons" style="float:right">create</i></a>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr>
                      <th></th>
                      <th>Client</th>
                      <th>Phone number</th>
                      <th>date of birth</th>
                      <th>Personal info</th>
                      <th>Date joined</th>
                    </tr></thead>
                    <tbody>
    @foreach($clients as $client)
    <tr>
      <td >
        <img height="50" width="50" style="border-radius:100px;"src="{{asset('img/clients/'.$client->profpic)}}" alt="" class="img-circle img-responsive">
      </td>
      <td >
        {{$client->name}}

    </td>
    <td>{{$client->phone}}</td>
    <td>{{$client->dob}}</td>
    <td>{{$client->basicInfo}}</td>
    <td>{{$client->created_at}}</td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
</div>
</div>
@endsection
