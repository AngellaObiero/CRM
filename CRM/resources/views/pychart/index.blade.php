
@extends("layouts.app")

@section("content")


<div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Sentiment Analyse</h4>
      </div>

      <div class="card-body">
          <div class="row">
                <div class="col-md-6">
                        <form action="{{url('analyze')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label for="hash">Hash Tag/Phrase to analyze</label>
                                  <input type="text" class="form-control" name="hashtag" placeholder="Enter phrase">
                                </div>
                                <div class="form-group">
                                  <label for="hash">Number of tweets to analyze</label>
                                  <input type="text" class="form-control" name="number_of_tweets" placeholder="Enter Number of tweets">
                                </div>

                            <button type="submit" class="btn btn-primary">Analyze</button>
                        </form>

                </div>

          </div>

      </div>
    </div>
</div>
@endsection
