<!DOCTYPE html>

<body>
  <section>  
    <div class="container d-flex justify-content-xl-center mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
      <h2>Opiniones reales de usuarios</h2>
    </div>
    <div class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center" id="prueba">
        <a href="<?=url."?controller=API&action=mostrarAllResenas"?>"><img src="assets/images/resenas.png" alt="..."></a>
    </div>
    <div class="container text-center d-flex justify-content-center ">
  </section>

<!-- ini form -->
    <section class="col">
      <div class="border container d-flx align-items-center mt-5 " style="width: 672px; height: auto; box-shadow: 5%;">
        <diV class="container text-center mt-3">
          <h3>Deja tu comentario !</h3>
        </diV>
        <form id="resenas_form" method='post' action="<?=url."?controller=API&action=recogerResenas"?>">
          <div class="ms-3">
            <label id="email_usr_val" class="newsletter-text form-label">Usuario: <?=$email_user?></label>
          </div>
          <div class="d-flex ms-3 mb-3">
          <textarea class="form-control" id="new_text_val" aria-label="With textarea"></textarea>
            <button  type="submit" class="ms-4 boton-sub rounded boton-hover">Enviar</button>
          </div>
          <div class="mb-3 ms-3 d-flex justify-content-between">
            <label id="val_pedid" class="newsletter-text form-label">Número de pedido: <?=$detallesPed->getPedido_id()?></label>
            <label id="val_fechPed" class="newsletter-text form-label">Fecha de compra: <?=$detallesPed->getFecha_pedido()?></label>        
            <label id="resena_clid" class="newsletter-text form-label" hidden><?=$detallesPed->getCliente_id()?></label>        
          </div>
          <div class="d-flex justify-content-center">
            <label class="newsletter-text form-label">Valoracion: </label>          
          </div>
          <div class="d-flex justify-content-center mb-3">
            <div class="rating">
              <input type="radio" id="star1" name="rating" value="5">
              <label for="star1"></label>
              <input type="radio" id="star2" name="rating" value="4">
              <label for="star2"></label>
              <input type="radio" id="star3" name="rating" value="3">
              <label for="star3"></label>
              <input type="radio" id="star4" name="rating" value="2">
              <label for="star4"></label>
              <input type="radio" id="star5" name="rating" value="1">
              <label for="star5"></label>
            </div>
          </div>
        </form>
      </div> 
    </section>
<!-- Fin Form -->
  <section>
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-6 d-flex justify-content-center">
          <a class="iconos" href="#"><img src="assets/icons/reloj.png" class="rounded me-2" alt="...">Plazo de entrega</a>
        </div>
        <div class="col-6 d-flex justify-content-center">
          <a class="iconos " href="#"><img src="assets/icons/devolucion.png" class="rounded me-2" alt="...">Devoluciones</a>
        </div>
      </div>
    </div>
  </section>
  <script src="assets/js/recoger_resenas.js"></script>
</body>