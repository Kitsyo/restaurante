let resultado = fetch("http://localhost/drim/restaurante/")
.then( data => data.json())
.then( resultado => console.log(resultado) );