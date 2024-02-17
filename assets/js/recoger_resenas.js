document.getElementById('resenas_form').addEventListener('submit',function(e){
  // e.preventDefault();
  // Obtiene el formulario
  let form = document.forms['resenas_form'];
  
  // Obtiene el usuario
  let usuario = document.getElementById('email_usr_val').textContent.split(': ')[1];
  
  // Obtiene el texto de la reseña
  let comentario_resena = form['new_text_val'].value;
  
  // Obtiene el número de pedido y lo convierte a entero
  let pedido_idString = document.getElementById('val_pedid').textContent.split(': ')[1];
  let pedido_id = parseInt(pedido_idString, 10);
  
  // Obtiene la fecha del pedido
  let fechaPedido = document.getElementById('val_fechPed').textContent.split(': ')[1];
  
  // Obtiene el id del cliente y lo convierte a entero
  let cliente_idString = document.getElementById('resena_clid').textContent;
  let cliente_id = parseInt(cliente_idString, 10);
  
  // Obtiene la valoración y la convierte a entero
  let valoracionString = document.querySelector('input[name="rating"]:checked').value;
  let valoracion = parseInt(valoracionString, 10);
  
  // Almacena todos los datos en un objeto
  const datos = {
     "usuario" : usuario,
     "comentario_resena" : comentario_resena,
     "pedido_id" : pedido_id,
     "fechaPedido" : fechaPedido,
     "cliente_id" : cliente_id,
     "valoracion" : valoracion
  };
  
  console.log(datos);

  fetch('http://localhost/proyectoLasala.com/drim/restaurante/?controller=API&action=recogerResenas', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  })
  .then(response => response.text())
  .then(datos => {
    console.log('Respuesta del servidor:', datos);
  })
  .catch(error => {
    console.error('Error:', error);
  });

});