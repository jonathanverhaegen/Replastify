const btnGood =  document.querySelectorAll("#btnGood");

btnGood.forEach((btn) => {
    btn.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let status = 1;
        let orderid = btn.dataset.orderid;
        
        sendData(status, orderid);
        document.querySelector('#btns').innerHTML = "juu"
        
    
    
    })
})


const btnBad =  document.querySelectorAll("#btnBad");

btnBad.forEach((btn) => {
    btn.addEventListener('click', (e) =>{
        e.preventDefault();
        
        let status = 3;
        let orderid = btn.dataset.orderid;
        
        sendData(status, orderid);
        document.querySelector('#btns').innerHTML = "juu";
        
    
    
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