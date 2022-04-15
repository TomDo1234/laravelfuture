<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

class NABAPItest extends Controller {

    public function request($request)
    {        
        $xml = simplexml_load_string($request);
        $cardnumber = $xml->from->card_number;
        $cardname = $xml->from->card_name;
        $amount = $xml->amount;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        if (preg_match("/[^0-9 ]/", (string) $cardnumber)) { // (string) casting because $cardnumber actually xml object
            return response()->json(['message' => 'Payment Failed'], 406);
        }// if statement to check if it has non numbers in it, spaces are fine, sends 406 http code if fails
        if (is_numeric((string) $amount)) {
            if ((float) $amount < 0) {
                return response()->json(['message' => 'Payment Failed'], 406);
            }
        }
        else {
            return response()->json(['message' => 'Payment Failed'], 406);
        }

        return "<?xml version='1.0' encoding='UTF-8'?>
        <from>
          <card_number>$cardnumber</card_number>
        </from>
        <amount>$amount</amount>
        <transaction_number>abc1234</transaction_number>
        <transaction_time>$date $time</transaction_time>";
    }
}