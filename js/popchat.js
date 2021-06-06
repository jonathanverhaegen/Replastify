const trigger = document.querySelector('.popchat__img');
let click = 0

trigger.addEventListener('click', (e) => {
    e.preventDefault();
    const chat = document.querySelector('.popchat__window');

    

    if(click === 0){
        chat.style.display = "block";
        click = 1;
    }else{
        chat.style.display = "none";
        click = 0;
    }
    
})

const chatBtn = document.querySelector('#chatBtn');

chatBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    let text = document.querySelector('#chatField').value;
    let senderid = chatBtn.dataset.senderid;
    let receiverid = chatBtn.dataset.receiverid;

    
    
    let formData = new FormData();
    
    formData.append('text', text);
    formData.append('senderid', senderid);
    formData.append('receiverid', receiverid);

    fetch('ajax/chat.php', {
        method: 'POST',
        body: formData
        })
        .then(response => response.json())
        .then(result => {
            console.log('Success:', result);

            const chat = document.querySelector('.popchat__chat');
            const item = document.createElement('li');
            item.className = "popchat__item popchat__item--self";

            const textfield = document.createElement('p');
            textfield.className = "chat__text popchat__text";
            textfield.innerHTML = text;

            const name = document.createElement('p');
            name.className = "chat__name";
            name.innerHTML = "Ik";

            chat.appendChild(item);
            item.appendChild(name);
            item.appendChild(textfield);


        })
        .catch(error => {
        console.error('Error:', error);
        });
})