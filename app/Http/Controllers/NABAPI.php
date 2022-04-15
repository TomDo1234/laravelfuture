<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Controller;
use Response;
use Illuminate\Http\Request;

class NABAPI extends Controller {

    public function request(Request $request)
    {
        
        $creditcardnumber = $request->creditcardnumber;
        print $creditcardnumber;
    }
}