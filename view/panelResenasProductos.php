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
    <section class="col">
      <diV class="container text-center mb-3 mt-3">
        <h3>Todos los comentarios !</h3>
      </diV>
    <div id="reviews">
        <?php
        foreach($allResenas as $resenas){
        ?>
      <div class="row">
          <div class="col d-flex justify-content-center"><p>Fecha de la reseña: <?=$resenas->getFecha_resena()?></p></div>
          <div class="col d-flex justify-content-center"><p>Numero del pedido: <?=$resenas->getPedido_id()?></p></div>
      </div>
      <div class="container review text-center">
        <h4><?=$resenas->getUsuario()?><small class="text-muted">   (<?=$resenas->getValoracion()?>/5)</small></h4>
        <p><?=$resenas->getComentario_resena()?></p>
      </div>
      <?php } ?>
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