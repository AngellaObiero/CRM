<?php

namespace App;

use AfricasTalking\SDK\AfricasTalking;

class SendSMS{

    public function sendSMS($to , $message){

        $username = env("AT_USERNAME");
        $apiKey   = env("AT_API_KEY");
        $from = env("AT_SHORTCODE");

        $AT = new AfricasTalking($username, $apiKey);

        $sms = $AT->sms();
        //
        // $result = $sms->send([
        //     'from' => $from,
        //     'to'      => $to,
        //     'message' => $message
        // ]);

        $result = $sms->send([
            'to'      => $to,
            'message' => $message
        ]);

        return $result['status'];

    }

}
