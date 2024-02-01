const form = document.querySelector('form');
const textarea = document.querySelector('textarea');
const ratingInputs = document.querySelectorAll('input[name="rating"]');

form.addEventListener('submit', (e) => {
  e.preventDefault();

  const clienteId = '<?=$detallesPed->getCliente_id()?>';
  const pedidoId = '<?=$detallesPed->getPedido_id()?>';
  const fechaPedido = '<?=$detallesPed->getFecha_pedido()?>';
  const comentario = textarea.value;
  const valoracion = Array.from(ratingInputs).find(input => input.checked).value;

  const data = new URLSearchParams({
    clienteId,
    pedidoId,
    fechaPedido,
    comentario,
    valoracion
  });

  fetch('http://localhost/proyectoLasala.com/drim/restaurante/?controller=api&action=panelResena', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: data
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error(error);
  });
});