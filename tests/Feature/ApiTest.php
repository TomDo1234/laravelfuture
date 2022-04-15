<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase 
{
    /**
     * My api test for Eugene
     *
     * @return void
     */
    
    public function test_apis()
    {
        $anz = new \App\Http\Controllers\ANZAPItest();
        $nab = new \App\Http\Controllers\NABAPItest();
        $nabxml  = '<?xml version="1.0" encoding="UTF-8"?>
        <request>
        <from>
          <card_number>123</card_number>
          <card_name>John Doe</card_name>
          <cvv>000</cvv>
        </from>
        <amount>1.00</amount>
        <merchant_id>123</merchant_id>
        <merchant_key>qwerty</merchant_key>
        </request>';

        $date = date("Y-m-d");
        $time = date("H:i:s");

        $nabexpected = "<?xml version='1.0' encoding='UTF-8'?>
        <from>
          <card_number>123</card_number>
        </from>
        <amount>1.00</amount>
        <transaction_number>abc1234</transaction_number>
        <transaction_time>$date $time</transaction_time>";

        $this->assertEquals($nabexpected,$nab->request($nabxml));

        $anzjson = '{
            "from":[
               {
                  "card_number":"123"
               },
               {
                  "card_name":"John Doe"
               },
               {
                  "cvv":"000"
               }
            ],
            "amount":1.01,
            "merchant_id":456,
            "merchant_key":"asdf"
         }';

        $anzexpected = '{"from":[{"card_number":"123"}],"amount":1.01,"transaction_number":"abc12345","transaction_time":"' . $date . ' ' . $time . '"}';
        $this->assertEquals($anzexpected,$anz->request(json_decode($anzjson,TRUE)));
    }
}
