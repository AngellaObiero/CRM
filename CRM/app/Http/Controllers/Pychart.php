<?php

namespace App\Http\Controllers;
use App\Charts\PieChart;
use App\Charts\SampleChart;
use Illuminate\Http\Request;
use Charts;
class Pychart extends Controller
{
    //


    public function index(){
        return view('pychart.index');
    }
    // public function

    public function getSentiment(Request $request){
        $number_of_tweets = $request->number_of_tweets;
        $hashtag = $request->hashtag;
        $output = shell_exec('python3 ../app/Http/Controllers/twitter.py '. $hashtag .' '. $number_of_tweets.' 2>&1');
        // $output->negative
        // $output = shell_exec('ls');
        $values = explode(',', $output);
        // return $output;
        $data = [
            'positive' => $values[0],
            'negative' => $values[1],
            'neutral' => $values[2],
            'total' => $values[3]
        ];
        $chart = new PieChart;
        $chart->labels(['positive', 'negative', 'neutral']);
        $chart->dataset('Sentiment', 'pie', [$values[0], $values[1], $values[2]])->options(['color' => '#ffffff']);

        return view('pychart.chart', ['chart' => $chart, 'positive' => $values[0], 'negative' => $values[1], 'neutral' => $values[2], 'total' => $values[3]]);

    }
    public function chartTest(){
        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset 1', 'pie', [400,300,120,400]);
        return view('pychart.chart', ['chart' => $chart])   ;

    }
}
