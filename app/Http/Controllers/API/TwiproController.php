<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Twilio\Rest\Client;

class TwiproController extends Controller
{
    public function createRoom(){

        // Find your Account Sid and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = "AC66a9264b1052c0862e8a71faf11b4c18";
        $token = "e31a5d93aa7e69b82f3a1e82292ac38b";
        $twilio = new Client($sid, $token);

        $room = $twilio->video->v1->rooms
                                ->create(["uniqueName" => "Jason"]);

        // print($room->sid);

        return $room->sid;


        return "Estamos en API excelente";
    }

    public function showRoom(){
        // Find your Account Sid and Auth Token at twilio.com/console
        // and set the environment variables. See http://twil.io/secure
        $sid = "AC66a9264b1052c0862e8a71faf11b4c18";
        $token = "e31a5d93aa7e69b82f3a1e82292ac38b";
        $twilio = new Client($sid, $token);

        
        $rooms = $twilio->video->v1->rooms
        ->read(["status" => "completed"], 20);

        $arr = [];
        foreach ($rooms as $record) {
            // print($record->sid);
            array_push($arr, $record->sid);
        }

        return $arr;
    }
}
