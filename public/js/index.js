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

    fetch('/nab.com',{
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({_token:data['_token'],xml:xml}),
    })
    .then(response => response.text())
    .then(response => alert(response));
});