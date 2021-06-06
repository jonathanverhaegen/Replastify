const inputImg = document.querySelector("#image");
const inputModel = document.querySelector('#model');

inputImg.addEventListener('change', (e) => {
    const container = document.querySelector('.popup__preview');

    let value = URL.createObjectURL(e.target.files[0]);;
    
    const img = document.createElement('img');
    img.className = "previewImg"
    img.src = value;
    container.appendChild(img);

    
})

inputModel.addEventListener('change', (e) => {
    const container = document.querySelector('.popup__preview__model');

    let value = e.target.files[0].name;

    let name = document.createElement('p');
    name.innerHTML = value;
    container.appendChild(name);
    
    
    

    
})