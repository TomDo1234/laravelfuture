<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

class ANZAPI extends Controller {

    public function request(Request $request)
    {
        
        $json = $request->json;
        $cardnumber = $json['from'][0]['card_number'];
        $amount = $json['amount'];
        $date = date("Y-m-d");
        $time = date("H:i:s");

        if (preg_match("/[^0-9 ]/", (string) $cardnumber)) { // (string) casting because $cardnumber actually xml object
            return response()->json(['message' => 'Payment Failed'], 406);
        }// if statement to check if it has non numbers in it, spaces are fine, sends 406 http code if fails



        return response(json_encode(array("from" => array(array("card_number" => $cardnumber))
        ,"amount" => $amount,"transaction_number" => "abc12345",
        "transaction_time" => "$date $time")));
    }
}