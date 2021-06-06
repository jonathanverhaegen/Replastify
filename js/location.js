class App{
    constructor(){
        this.getLocation();
    }

    getLocation(){
        navigator.geolocation.getCurrentPosition(this.succes);

    }

    succes(pos){
        
        let lat = pos.coords.latitude;
        let lng = pos.coords.longitude;

        app.getCity(lat,lng);
        
    }

    getCity(lat,lng){

        let key = "19b2bc6c45ce4513abb54cf86761a7d8";
        
        let url = `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lng}&key=${key}`;

        fetch(url).then((response) =>{
            return response.json();
        }).then((json) =>{

            console.log(json);
            let street = json.results[0].components.road;
            let city = json.results[0].components.town;
            let postalcode = json.results[0].components.postcode;
            let country = json.results[0].components.country;

            

            document.querySelector(".detail__city").innerHTML = city;
            document.querySelector(".detail__adress").innerHTML = `${postalcode} - ${street}`;
            document.querySelector("#location").value = city;

            //printers ophalen

            getPrinters(city);

            
            
            

                 
        })

    }

    
}


let app = new App;


const input = document.querySelector("#location");

input.addEventListener("change", (e) => {
    
    // if(e.keyCode === 13){
        let city = e.target.value;
        getPrinters(city);
        
        
    // }
})




const getPrinters = (city) =>{
    let formData = new FormData();
        formData.append('city', city);

        fetch('ajax/location.php', {
            method: 'POST',
            body: formData
            })
            .then(response => response.json())
            .then(result => {
                console.log('Success:', result);

                let printers = result.printers;
                
                printers.forEach((printer)=>{
                    let street = printer.street;
                    let username = printer.username;
                    let img = printer.avatar;
                    let id = printer.id;
                    
                    let printerContainer = document.querySelector("#printers");

                    let printerbox = document.createElement('a');
                    printerbox.className = "detail__printer"
                    printerbox.href = "";
                    printerbox.dataset.printerid = id;

                    let avatar = document.createElement('img');
                    avatar.className = 'detail__printer__img';
                    avatar.src = 'images/' + img;

                    let name = document.createElement('p');
                    name.className = "detail__printer__name";
                    name.innerHTML = username;

                    let adress = document.createElement('p');
                    adress.className = "detail__printer__adress";
                    adress.innerHTML = street;

                    printerContainer.appendChild(printerbox);
                    printerbox.appendChild(avatar);
                    printerbox.appendChild(name);
                    printerbox.appendChild(adress);

                    printerbox.addEventListener('click', (e)=>{
                        e.preventDefault();
                        let printerid = e.target.dataset.printerid;
                        getPrinterById(printerid);
                        
                    })
                    

                })
                })
                .catch(error => {
                console.error('Error:', error);
                });
}

const getPrinterById = (id) => {
    let formData = new FormData();
        formData.append('id', id);

        fetch('ajax/printer.php', {
            method: 'POST',
            body: formData
            })
            .then(response => response.json())
            .then(result => {
                console.log('Success:', result);
            let username = result.printer.username;
            let street = result.printer.street;
            let id = result.printer.id;
            document.querySelector('#printer').value = username;
            document.querySelector('#adres').value = street;
            let link = document.querySelector('#printerBtn').href;
            document.querySelector('#printerBtn').href = link + `&printer=${id}`;

            })   
            .catch(error => {
            console.error('Error:', error);
            });
}





    