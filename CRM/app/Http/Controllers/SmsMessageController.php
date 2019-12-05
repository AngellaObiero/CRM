<?php

namespace App\Http\Controllers;

use App\SendSMS;
use App\SmsMessage;
use Illuminate\Http\Request;

class SmsMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $smsMessages=SmsMessage::all();
        return view("sms_messages.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("sms_messages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message=$request->message;
        foreach ($request->client_id as $client_id) {
          // code...
          $to=\App\Client::find($client_id)->phone;
          // var_dump($to);
          $testSMS = new \App\SendSMS();

          $testSMS->sendSMS($to , $message);
        }
        SmsMessage::create([
          "client_id"=>$client_id,
          "message"=>$message
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmsMessage  $smsMessage
     * @return \Illuminate\Http\Response
     */
    public function show(SmsMessage $smsMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmsMessage  $smsMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsMessage $smsMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmsMessage  $smsMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsMessage $smsMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmsMessage  $smsMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsMessage $smsMessage)
    {
        //
    }
}
