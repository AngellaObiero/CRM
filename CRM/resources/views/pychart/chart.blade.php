
@extends("layouts.app")
@section('javascript')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
@endsection
@section("content")

<div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Sentiment Analyse</h4>
      </div>

      <div class="card-body">
          <div class="row">
                <div class="col-md-6">

                    {!! $chart->container() !!}


                </div>
                <div class="col-md-6">
                    <p>Neutral : {{ $neutral }} %</p>
                    <p>Positive: {{ $positive }} %</p>
                    <p>Negative : {{ $negative }} %</p>
                    <p>Total : {{ $total }} tweets</p>
                </div>
          </div>

      </div>
    </div>
</div>
@section('scripts')

<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $chart->script() !!}
@endsection
@endsection
