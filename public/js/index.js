let company = "NAB"
document.getElementById("theform").addEventListener("submit",function(e) {   
    e.preventDefault();

    let inputs = document.getElementById("theform").children;
    let data = {};
    for (let input of inputs) {
        data[input.name] = input.value;
    }

    let xml = `<?xml version="1.0" encoding="UTF-8"?>
    <response>
    <from>
    <card_number>${data['creditcardnumber']}</card_number>
    <card_name>${data['creditcardname']}</card_name>
    <cvv>000</cvv>
    </from>
    <amount>${data['amounttotransfer']}</amount>
    <merchant_id>123</merchant_id>
    <merchant_key>qwerty</merchant_key>
    </response>
    `;

    let thejson = {
        "from":[
           {
              "card_number":data['creditcardnumber']
           },
           {
              "card_name":data['creditcardname']
           },
           {
              "cvv":"000"
           }
        ],
        "amount":data['amounttotransfer'],
        "merchant_id":456,
        "merchant_key":"asdf"
    };
     
    if (company === "NAB") {
        fetch('/nab.com',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({_token:data['_token'],xml:xml}),
        })
        .then(response => response.text())
        .then(response => document.getElementById("theresponse").innerText = response);
    }
    else if (company === "ANZ") {
        fetch('/anz.com',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({_token:data['_token'],json:thejson}),
        })
        .then(response => response.text())
        .then(response => document.getElementById("theresponse").innerHTML = response);
    }
    
});