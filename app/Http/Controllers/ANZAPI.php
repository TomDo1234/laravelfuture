<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

class ANZAPI extends Controller {

    public function request(Request $request)
    {
        
        $creditcardnumber = $request->creditcardnumber;
        $creditcardname = $request->creditcardname;
        $validuntil = $request->validuntil;
        $amount = $request->amounttotransfer;
        print "$creditcardnumber $creditcardname $validuntil $amount";
    }
}