<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

use App\User;

class NABAPI extends Controller {

    public function request(Request $request)
    {
        
        $creditcardnumber = $request->creditcardnumber;
        print $creditcardnumber;
    }
}