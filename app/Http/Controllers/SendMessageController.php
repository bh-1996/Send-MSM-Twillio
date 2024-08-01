<?php

namespace App\Http\Controllers;

use App\Models\SendMessage;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SendMessageController extends Controller
{

    public function sendMessageView()
    {
        return view('message');
    }


    public function sendSms(Request $request)
    {
        // dd($request->all());
        // Your Account SID and Auth Token from twilio.com/console
        $sid    = env('TWILIO_SID');
        $token  = env('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required'
        ]);

        if ($validator->passes()) {
            $numbers_in_arrays = explode(',', $request->input('numbers'));
            // dd($numbers_in_arrays);

            $message = $request->input('message');
            $count = 0;

            foreach ($numbers_in_arrays as $number) {
                $count++;

                $client->messages->create(
                   '+91'. $number,
                    [
                        'from' => env('TWILIO_SMS_FROM_NUMBER'),
                        'body' => $message,
                    ]
                );
            }

            return back()->with('success', $count . " messages sent!");
        } else {
            return back()->withErrors($validator);
        }
    }
}
