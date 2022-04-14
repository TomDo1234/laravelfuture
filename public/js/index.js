document.getElementById("theform").addEventListener("submit",function(e) {
    e.preventDefault();

    let inputs = document.getElementById("theform").children;
    let data = {};
    for (let input of inputs) {
        data[input.name] = input.value;
    }
    console.log(data);
    fetch('/nab.com',{
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(response => alert(response));
});