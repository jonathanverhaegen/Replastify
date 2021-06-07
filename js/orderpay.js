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