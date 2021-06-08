let btn = document.querySelector('#pay');

btn.addEventListener('click', (e) => {
    e.preventDefault();
    let orderid = btn.dataset.orderid;
    let status = 4;
    console.log(orderid);

    let formData = new FormData();
    
    formData.append('orderid', orderid);
    formData.append('status', status);

    fetch('ajax/status.php', {
        method: 'POST',
        body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log('Success:', result);
            window.location.href = "orders.php";

        })
        .catch(error => {
        console.error('Error:', error);
        });

})

let btnDis = document.querySelector('#btnDis');

btnDis.addEventListener('click', (e) => {
    e.preventDefault();
    const input = document.querySelector('#korting').value;
    if(input === "kortingscode"){
        let price = parseInt(document.querySelector('#total').innerHTML);
        let discound = price * 0.10;
        let newTotal =  price - discound;
        document.querySelector('#total').innerHTML = newTotal;
        document.querySelector('.order__korting').style.display = "block";
        document.querySelector('.amount').style.display = "block";
    }else{
        document.querySelector('#korting').value = "foute kortingscode"
        document.querySelector('#korting').style.color = "red";
    }
    

})