


> Written with [StackEdit](https://stackedit.io/).
> **Projecto nº2**
> Para implementar las reseñas en la pagina, se a hecho mediante un formulario i JavaScript, que envía la información que recoge des de un formulario, en el cual esta seteado la información del usuario i el pedido seleccionado que ese usuario tiene en su registro de la base de datos y envía la información des de este al JS i realiza la petición con todos los datos necesarios para reenviarlos como JSON al PHP i poder formar tanto la lista de reseñas publicadas de todos los usuarios como un filtro para todas las reseñas de un usuario en concreto.

** JAVASCRIPTS**
Esta es la forma en laque recojo la información del formulario para pasarla mediante fetch a la api:

Recojer_resena.js
---
    document.getElementById('resenasform').addEventListener('subm

    it',function(e){
    
    e.preventDefault();
    
    // Obtiene el formulario
    
    let  form = document.forms['resenasform'];
    
    // Obtiene el usuario
    
    let  usuario = document.getElementById('email_usr_val').textContent.split(': ')[1];
    
    // Obtiene el texto de la reseña
    
    let  comentario_resena = form['new_text_val'].value;
    
    // Obtiene el número de pedido y lo convierte a entero
    
    let  pedido_idString = document.getElementById('val_pedid').textContent.split(': ')[1];
    
    let  pedido_id = parseInt(pedido_idString, 10);
    
    // Obtiene la fecha del pedido
    
    let  fechaPedido = document.getElementById('val_fechPed').textContent.split(': ')[1];
    
    // Obtiene el id del cliente y lo convierte a entero
    
    let  cliente_idString = document.getElementById('resena_clid').textContent;
    
    let  cliente_id = parseInt(cliente_idString, 10);
    
    // Obtiene la valoración y la convierte a entero
    
    let  valoracionString = document.querySelector('input[name="rating"]:checked').value;
    
    let  valoracion = parseInt(valoracionString, 10);
    
    // Almacena todos los datos en un objeto
    
    const  datos = {
    
    "usuario" :  usuario,
    
    "comentario_resena" :  comentario_resena,
    
    "pedido_id" :  pedido_id,
    
    "fechaPedido" :  fechaPedido,
    
    "cliente_id" :  cliente_id,
    
    "valoracion" :  valoracion
    
    };
    
    console.log(datos);
    
    fetch('https://adrialasala.bernat2024.es/?controller=API&action=recogerResenas', {
    
    method:  'POST',
    
    headers: {
    
    'Content-Type':  'application/json'
    
    },
    
    body:  JSON.stringify(datos)
    
    })
    
    .then(response  =>  response.text())
    
    .then(datos  => {
    
    console.log('Respuesta del servidor:', datos);
    
    })
    
    .catch(error  => {
    
    console.error('Error:', error);
    
    });
    
      
    
    });
    

---
Y esta es la fomrma en la que envio la informacion a la api para tratarla:

mostrar_resena.js
---

    document.addEventListener('DOMContentLoaded', function(){
    
    fetch("http://localhost/proyectoLasala.com/drim/restaurante/?controller=API&action=mostrarResenas",{
    
    method:  "POST",
    
    headers: {
    
    'Content-Type':'application/x-www-form-urlencoded',
    
    },
    
    body:  new  URLSearchParams({
    
    action:  'mostrarResenas',
    
    }),
    
    })
    
    .then(response  => {
    
    return  response.json();
    
    })
    
    .then(data  => {
    
    consele.log(data); //"Aqui vas a llamar las funciones donde muestra tu HTML"
    
    })
    
    .catch(error  => {
    
    console.error(error);
    
    });
    
    })

---

Con esta información, la envio al controllador de la API para tratarlo con diferentes funciones en PHP:

APIController.php
---

    <?php
    
    //Esto es un NUEVO CONTROLADOR
    
    //hacer todas las configuraciones necesarias para que funcione como controlador
    
      
    
    /** IMPORTANTE**/
    
    //Cargar Modelos necesarios BBDD
    
    include_once  "model/productoDAO.php";
    
    include_once  "model/clienteDAO.php";
    
    include_once  "model/pedidoDAO.php";
    
    include_once  "config/parameters.php";
    
    include_once  "model/resenasDAO.php";
    
      
    
    /** IMPORTANTE**/
    
    //Instala la extensión Thunder Client en VSC. Te permite probar si tu API funciona correctamente.
    
      
      
    
    class  APIController{
    
    public  function  recogerResenas(){
    
    // Recoger el contenido JSON enviado por la solicitud POST
    
    $json = file_get_contents('php://input');
    
    // var_dump($json);
    
    // Decodificar el JSON en un array asociativo de PHP
    
    $datos = json_decode($json, TRUE);
    
    // Verifica si los datos son válidos
    
    if (isset($datos['usuario']) && isset($datos['comentario_resena']) && isset($datos['pedido_id']) && isset($datos['fechaPedido']) && isset($datos['cliente_id']) && isset($datos['valoracion'])) {
    
    // Procesa los datos aquí, por ejemplo, guardarlos en una base de datos
    
    $email = $datos['usuario'];
    
    $cliente_id = $datos['cliente_id'];
    
    $comentario_resena = $datos['comentario_resena'];
    
    $pedido_id = $datos['pedido_id'];
    
    $fecha_resena = $datos['fechaPedido'];
    
    $valoracion = $datos['valoracion'];
    
    resenasDAO::setResena($cliente_id, $pedido_id, $email, $valoracion, $fecha_resena, $comentario_resena);
    
    // Envía una respuesta JSON exitosa
    
    echo  json_encode(['success' => true]);
    
      
    
    }
    
    header("Location:".url."?controller=API&action=mostrarResenasUsuario");
    
    }
    
    public  function  mostrarAllResenas(){
    
    session_start();
    
    include_once  "model/resenasDAO.php";
    
    include_once  "model/Producto.php";
    
    include_once  "model/Pedido.php";
    
    include_once  "model/PedidoDetalle.php";
    
    include_once  "model/clientes.php";
    
    include_once  "model/Resenas.php";
    
    if (!isset($_SESSION['selecciones'])){
    
    $_SESSION['selecciones'] = array();
    
    }
    
    if (!isset($_SESSION['usuario'])){
    
    $_SESSION['usuario'] = array();
    
    }
    
    $allResenas = resenasDAO::getAllResenas();
    
      
    
    include_once  "view/cabecera/cabecera_login.php";
    
    //Panel
    
    include_once  "view/panelResenasProductos.php";
    
    //footer
    
    include_once  "view/footer.php";
    
    }
    
    public  function  mostrarResenasUsuario(){
    
    session_start();
    
    include_once  "model/resenasDAO.php";
    
    include_once  "model/Producto.php";
    
    include_once  "model/Pedido.php";
    
    include_once  "model/PedidoDetalle.php";
    
    include_once  "model/clientes.php";
    
    include_once  "model/Resenas.php";
    
    if (!isset($_SESSION['selecciones'])){
    
    $_SESSION['selecciones'] = array();
    
    }
    
    if (!isset($_SESSION['usuario'])){
    
    $_SESSION['usuario'] = array();
    
    }
    
    $id = $_SESSION['usuario']->getCliente_id();
    
    $email = $_SESSION['usuario']->getEmail();
    
    $allResenas = resenasDAO::getAllResenasById($id);
    
      
    
    include_once  "view/cabecera/cabecera_login.php";
    
    //Panel
    
    include_once  "view/panelResenasUsuario.php";
    
    //footer
    
    include_once  "view/footer.php";
    
    }
    
    }

---

Con estas funciones puedo tratar la información con facilidad i mostrarla en la página web:

Vista del panel de la reseña, para recoger los datos:
---

    <!DOCTYPE  html>
    
      
    
    <body>
    
    <section>
    
    <div  class="container d-flex justify-content-xl-center mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
    
    <h2>Opiniones reales de usuarios</h2>
    
    </div>
    
    <div  class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center"  id="prueba">
    
    <a  href="<?=url."?controller=API&action=mostrarAllResenas"?>"><img  src="assets/images/resenas.png"  alt="..."></a>
    
    </div>
    
    <div  class="container text-center d-flex justify-content-center ">
    
    </section>
    
      
    
    <!-- ini form -->
    
    <section  class="col">
    
    <div  class="border container d-flx align-items-center mt-5 "  style="width: 672px; height: auto; box-shadow: 5%;">
    
    <diV  class="container text-center mt-3">
    
    <h3>Deja tu comentario !</h3>
    
    </diV>
    
    <form  id="resenas_form"  method='post'  action="<?=url."?controller=API&action=recogerResenas"?>">
    
    <div  class="ms-3">
    
    <label  id="email_usr_val"  class="newsletter-text form-label">Usuario: <?=$email_user?></label>
    
    </div>
    
    <div  class="d-flex ms-3 mb-3">
    
    <textarea  class="form-control"  id="new_text_val"  aria-label="With textarea"></textarea>
    
    <button  type="submit"  class="ms-4 boton-sub rounded boton-hover">Enviar</button>
    
    </div>
    
    <div  class="mb-3 ms-3 d-flex justify-content-between">
    
    <label  id="val_pedid"  class="newsletter-text form-label">Número de pedido: <?=$detallesPed->getPedido_id()?></label>
    
    <label  id="val_fechPed"  class="newsletter-text form-label">Fecha de compra: <?=$detallesPed->getFecha_pedido()?></label>
    
    <label  id="resena_clid"  class="newsletter-text form-label"  hidden><?=$detallesPed->getCliente_id()?></label>
    
    </div>
    
    <div  class="d-flex justify-content-center">
    
    <label  class="newsletter-text form-label">Valoracion: </label>
    
    </div>
    
    <div  class="d-flex justify-content-center mb-3">
    
    <div  class="rating">
    
    <input  type="radio"  id="star1"  name="rating"  value="5">
    
    <label  for="star1"></label>
    
    <input  type="radio"  id="star2"  name="rating"  value="4">
    
    <label  for="star2"></label>
    
    <input  type="radio"  id="star3"  name="rating"  value="3">
    
    <label  for="star3"></label>
    
    <input  type="radio"  id="star4"  name="rating"  value="2">
    
    <label  for="star4"></label>
    
    <input  type="radio"  id="star5"  name="rating"  value="1">
    
    <label  for="star5"></label>
    
    </div>
    
    </div>
    
    </form>
    
    </div>
    
    </section>
    
    <!-- Fin Form -->
    
    <section>
    
    <div  class="container mt-5 mb-5">
    
    <div  class="row">
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos"  href="#"><img  src="assets/icons/reloj.png"  class="rounded me-2"  alt="...">Plazo de entrega</a>
    
    </div>
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos "  href="#"><img  src="assets/icons/devolucion.png"  class="rounded me-2"  alt="...">Devoluciones</a>
    
    </div>
    
    </div>
    
    </div>
    
    </section>
    
    <script  src="assets/js/recoger_resenas.js"></script>
    
    </body>

---

Y esta es la manera de mostrarla para diferentes usuarios:

A un usuario unico:
---

    <!DOCTYPE  html>
    
      
    
    <body>
    
    <section>
    
    <div  class="container d-flex justify-content-xl-center mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
    
    <h2>Tus Reseñas !</h2>
    
    </div>
    
    <div  class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center"  id="prueba">
    
    <a  href="<?=url."?controller=API&action=mostrarAllResenas"?>"><img  src="assets/images/resenas.png"  alt="..."></a>
    
    </div>
    
    <div  class="container text-center d-flex justify-content-center ">
    
    </section>
    
    <section  class="col">
    
    <diV  class="container text-center mb-3 mt-3">
    
    <h3>Todos los comentarios de <?=$email?></h3>
    
    </diV>
    
    <div  id="reviews">
    
    <?php
    
    foreach($allResenas as $resenas){
    
    ?>
    
    <div  class="row mt-5">
    
    <div  class="col d-flex justify-content-center"><p>Fecha de la reseña: <?=$resenas->getFecha_resena()?></p></div>
    
    <div  class="col d-flex justify-content-center"><p>Numero del pedido: <?=$resenas->getPedido_id()?></p></div>
    
    </div>
    
    <div  class="container review text-center">
    
    <h4><?=$resenas->getUsuario()?><small  class="text-muted"> (<?=$resenas->getValoracion()?>/5)</small></h4>
    
    <p><?=$resenas->getComentario_resena()?></p>
    
    </div>
    
    <?php } ?>
    
    </div>
    
    </section>
    
    <!-- Fin Form -->
    
    <section>
    
    <div  class="container mt-5 mb-5">
    
    <div  class="row">
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos"  href="#"><img  src="assets/icons/reloj.png"  class="rounded me-2"  alt="...">Plazo de entrega</a>
    
    </div>
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos "  href="#"><img  src="assets/icons/devolucion.png"  class="rounded me-2"  alt="...">Devoluciones</a>
    
    </div>
    
    </div>
    
    </div>
    
    </section>
    
    <script  src="assets/js/recoger_resenas.js"></script>
    
    </body>

---

Todas la reseñas de los usuarios:
---

    <!DOCTYPE  html>
    
      
    
    <body>
    
    <section>
    
    <div  class="container d-flex justify-content-xl-center mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
    
    <h2>Opiniones reales de usuarios</h2>
    
    </div>
    
    <div  class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center"  id="prueba">
    
    <a  href="<?=url."?controller=API&action=mostrarAllResenas"?>"><img  src="assets/images/resenas.png"  alt="..."></a>
    
    </div>
    
    <div  class="container text-center d-flex justify-content-center ">
    
    </section>
    
    <section  class="col">
    
    <diV  class="container text-center mb-3 mt-3">
    
    <h3>Todos los comentarios !</h3>
    
    </diV>
    
    <div  id="reviews">
    
    <?php
    
    foreach($allResenas as $resenas){
    
    ?>
    
    <div  class="row">
    
    <div  class="col d-flex justify-content-center"><p>Fecha de la reseña: <?=$resenas->getFecha_resena()?></p></div>
    
    <div  class="col d-flex justify-content-center"><p>Numero del pedido: <?=$resenas->getPedido_id()?></p></div>
    
    </div>
    
    <div  class="container review text-center">
    
    <h4><?=$resenas->getUsuario()?><small  class="text-muted"> (<?=$resenas->getValoracion()?>/5)</small></h4>
    
    <p><?=$resenas->getComentario_resena()?></p>
    
    </div>
    
    <?php } ?>
    
    </div>
    
    </section>
    
    <!-- Fin Form -->
    
    <section>
    
    <div  class="container mt-5 mb-5">
    
    <div  class="row">
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos"  href="#"><img  src="assets/icons/reloj.png"  class="rounded me-2"  alt="...">Plazo de entrega</a>
    
    </div>
    
    <div  class="col-6 d-flex justify-content-center">
    
    <a  class="iconos "  href="#"><img  src="assets/icons/devolucion.png"  class="rounded me-2"  alt="...">Devoluciones</a>
    
    </div>
    
    </div>
    
    </div>
    
    </section>
    
    <script  src="assets/js/recoger_resenas.js"></script>
    
    </body>

---

**Problemas**
Cabe destacar los multiples problemas que me he encontrado a la hora de realizar todo esto.

En primer lugar configurar la API para que envíe i recoja la información, no poder tratarla porque no reconoze el tipo de objeto que le mando, la forma en la que he solucionado este problema es parseando directamente la información antes de enviarla a la api mediante fetch:

    // Obtiene el número de pedido y lo convierte a entero
    let  pedido_idString = document.getElementById('val_pedid').textContent.split(': ')[1];
    let  pedido_id = parseInt(pedido_idString, 10);
También con las valoraciones:

    // Obtiene la valoración y la convierte a entero
    let  valoracionString = document.querySelector('input[name="rating"]:checked').value;
    let  valoracion = parseInt(valoracionString, 10);

A la hora de tratar la información, me he encontrado también con problemas para leer los datos, esto a sido mas sencillo de solucionar añadiendo algún campo extra a las tablas de la bbdd (como el usuario que hace la reseña).

**Conclusiones**
Al principio del projecto no tenia muy claro como funcionaba JS i las APIs y a sido un mundo saber como implementarlo todo de manera funcional y practica, aunque no creo que esto este hecho del todo, aún falta muchisimo trabajo por hacer, esto son solo las reseñas, faltan las propinas, el QR y los puntos.
Pero el pero el primer paso esta dado y ahora que entiendo como es el funcionamiento de la aplicación debería ser mucho mas fácil implementar el resto.
