// let resultado = fetch("http://localhost/drim/restaurante/")
// .then( data => data.json())
// .then( resultado => console.log(resultado) );

document.addEventListener('DOMContentLoaded', function(){
    fetch("http://localhost/drim/restaurante/",{
        method: "POST",
        headers: {
            'Content-Type':'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'mostrarResenas',
        }),
    }) 
    .then(response => {
        return response.jason();
    })
    .then(data => {
        // mostrarResenas(data); "Aqui vas a llamar las funciones donde muestra tu HTML"
    })
    .catch(error => {
        console.error(error);
    });
})


