<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function SendSMS(Request $request){
        try {
            $account_sid = env('TWILIO_SID');
            $account_token = env('TWILIO_TOKEN');
            $number = env('TWILIO_FROM');
            $client = new Client($account_sid,$account_token);
            $client->messages->create('+91'.$request->number,[
                'from'=>$number,
                'body'=>$request->message
            ]);
            return "Message Sent";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
