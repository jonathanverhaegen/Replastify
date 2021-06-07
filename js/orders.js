

const orders = document.querySelectorAll('#btns');

orders.forEach((order) => {

    let btnGood = order.querySelector('#btnGood');
    

    btnGood.addEventListener('click', (e) =>{
        e.preventDefault();
        
            let status = 1;
            let orderid = btnGood.dataset.orderid;
                
            sendData(status, orderid);
            order.innerHTML = "<p class='order__status order__status--good'>De bestelling is goedgekeurd</p>"
    })

    let btnBad = order.querySelector('#btnBad');

    btnBad.addEventListener('click', (e) => {
        e.preventDefault();
        
        let status = 3;
        let orderid = btnBad.dataset.orderid;
        
        sendData(status, orderid);
        order.innerHTML = "<p class='order__status order__status--alert'>De bestelling is geweigerd</p>"
    })

})

const sendData = (status, orderid) =>{
    let formData = new FormData();
    formData.append('status', status);
    formData.append('orderid', orderid);

    fetch('ajax/status.php', {
        method: 'POST',
        body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log('Success:', result);

        })
        .catch(error => {
        console.error('Error:', error);
        });
}