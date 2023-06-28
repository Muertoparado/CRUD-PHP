const btnid =document.querySelector("#btnid");
const bid= document.querySelector("#bid");
const render = document.querySelector("#render");
const renWorkinfo =document.querySelector("#renWorkinfo");
const renPersonalref= document.querySelector("#renPersonalref");
const renWorkinginfo =document.querySelector("#renWorkinginfo");
const searchid=async (id)=>{
    const id = await fetch(`http://localhost/CRUD-PHP/backend/${tabla}/${id}`);
    const datapag = await id.json();
    console.log(datapag);
    return datapag;
}

btnid.addEventListener('click', async () => {
    console.log("id");
    const buscarid = await searchid(bid.value);
    console.log(buscarid);
    
    for (let index = 0; index < buscarid.length; index++) {
        const element = buscarid[index];
        
        const card = document.createElement('div');
        card.classList.add('card');
        card.style.width = '18rem';
        
        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        
        const valueParagraph = document.createElement('p');
        valueParagraph.textContent = element.value;
        
        cardBody.appendChild(valueParagraph);
        card.appendChild(cardBody);
        
        render.appendChild(card);
    }
});
    

btnid.addEventListener('click', async () => {
    const data = await fetchEndpointData(); // Obtener los datos del endpoint
    console.log(data);

    data.forEach(element => {
        const card = document.createElement('div');
        card.classList.add('card');
        card.style.width = '18rem';

        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');

        // Agrega aquí el código para renderizar los datos de cada elemento
        // Puedes acceder a las propiedades del elemento y crear elementos HTML para mostrar los datos en la tarjeta

        card.appendChild(cardBody);
        render.appendChild(card);
    });
});

// Función para obtener los datos del endpoint
async function fetchEndpointData() {
    // Realiza aquí la solicitud al endpoint y devuelve los datos obtenidos
    // Puedes utilizar fetch u otras bibliotecas para realizar la solicitud a la API y obtener los datos
    // Asegúrate de procesar la respuesta y devolver los datos en el formato adecuado (por ejemplo, un arreglo de objetos)
}
