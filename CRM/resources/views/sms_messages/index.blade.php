@extends("layouts.app")
@section("content")
<div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Sms messages</h4>
                  <p class="card-category">Messages sent to clients</p>
                  <a href="{{url('sms/create')}}"><i class="material-icons" style="float:right">create</i></a>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr>
                      <th>Client</th>
                      <th>Message</th>
                      <th>Date time</th>
                    </tr></thead>
                    <tbody>
    @foreach(\App\SmsMessage::orderBy("id","DESC")->get() as $sms)
    <tr>
      <td >
        <img height="50" width="50" style="border-radius:100px;"src="{{asset('img/clients/'.\App\Client::find($sms->client_id)->profpic)}}" alt="" class="img-circle img-responsive">
      </td>
      <td >
        <p><b>{{\App\Client::find($sms->client_id)->name}}</b></p>
      <p>{{$sms->message}}</p>
    </td>
    <td>{{$sms->created_at}}</td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
</div>
</div>

@endsection
