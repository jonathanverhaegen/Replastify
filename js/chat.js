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

            let picture = result.picture;

            const chat = document.querySelector('.chat__con');
            const item = document.createElement('li');
            item.className = "chat__item chat__item--self"

            const textfield = document.createElement('p');
            textfield.className = "chat__text";
            textfield.innerHTML = text;

            const image = document.createElement('img');
            image.className = "chat__img";
            image.src = "images/" + picture;

            chat.appendChild(item);
            item.appendChild(image);
            item.appendChild(textfield);

        })
        .catch(error => {
        console.error('Error:', error);
        });
})