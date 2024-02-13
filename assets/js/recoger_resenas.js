function obtenerDatosReseña() {
  // Obtiene el formulario
  const form = document.forms['resenas_form'];
  
  // Obtiene el usuario
  const usuario = document.getElementById('email_usr_val').textContent.split(': ')[1];
  
  // Obtiene el texto de la reseña
  const texto_resena = form['new_text_val'].value;
  
  // Obtiene el número de pedido y lo convierte a entero
  const numeroPedidoString = document.getElementById('val_pedid').textContent.split(': ')[1];
  const numeroPedido = parseInt(numeroPedidoString, 10);
  
  // Obtiene la fecha del pedido
  const fechaPedido = document.getElementById('val_fechPed').textContent.split(': ')[1];
  
  // Obtiene el id del cliente y lo convierte a entero
  const clienteIdString = document.getElementById('resena_clid').textContent;
  const clienteId = parseInt(clienteIdString, 10);
  
  // Obtiene la valoración y la convierte a entero
  const valoracionString = document.querySelector('input[name="rating"]:checked').value;
  const valoracion = parseInt(valoracionString, 10);
  
  // Almacena todos los datos en un objeto
  const datos = {
    usuario,
    texto_resena,
    numeroPedido,
    fechaPedido,
    clienteId,
    valoracion
  };
  
  // Devuelve el objeto con todos los datos
  return datos;
}

async function enviarDatosReseña() {
  // Obtiene los datos de la reseña
  const datos = obtenerDatosReseña();
  
  // Prepara la solicitud para enviar los datos a la API
  const url = ''; // URL de la API
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  };
  
  // Envía la solicitud a la API
  try {
    const response = await fetch(url, options);
    
    // Verifica si la solicitud fue exitosa
    if (response.ok) {
      console.log('Reseña enviada con éxito');
    } else {
      console.error('Error al enviar la reseña:', response.statusText);
    }
  } catch (error) {
    console.error('Error al enviar la reseña:', error);
  }
}