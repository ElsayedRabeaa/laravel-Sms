<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
   public function send(){



    $basic  = new \Vonage\Client\Credentials\Basic("97d78c19", "DphHlfm4ZabndkUW");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS("201017008257", 'test', 'A text message sent using the Nexmo SMS API')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }

   }
}
