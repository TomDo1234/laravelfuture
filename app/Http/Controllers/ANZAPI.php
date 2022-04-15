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
        print json_encode(array("from" => array(array("card_number" => $cardnumber))
        ,"amount" => $amount,"transaction_number" => "abc12345",
        "transaction_time" => "$date $time"));
    }
}