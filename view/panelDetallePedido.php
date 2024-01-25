<!DOCTYPE html>
<body>
    
  <section>  
    <div class="container d-flex justify-content-xl-start mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
      <h2>Opiniones reales de usuarios</h2>
    </div>
    <div class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center" id="prueba">
        <a href="#"><img src="assets/images/resenas.png" alt="..."></a>
    </div>
    <div class="container text-center d-flex justify-content-center ">
      <div class="row">
        <div class="col-12 mt-5">
            <div>*Aqui van las reseñas*</div>
            <?php
            foreach($pruebas as $prueba){?>
            <div class="mt-4 container row">
              <div class="d-flex justify-content-center align-items-center col">
                <div class="pt-3 detalles-ped d-flex justify-content-center align-items-center"><p class="md-3">Pedido nº: <?=$prueba->getPedido_id()?></p></div>
                <div class="pt-3 detalles-ped d-flex justify-content-center align-items-center"><p class="md-3">Fecha: <?=$prueba->getFecha_pedido()?></p></div>
                <div class="pt-3 detalles-ped d-flex justify-content-center align-items-center"><p class="md-3">Cantidad: <?=$prueba->getCantidad()?></p></div>
                <div class="pt-3 detalles-ped d-flex justify-content-center align-items-center"><p class="md-3">Precio total: <?=$prueba->getPrecioTotal()?></p></div>
                <form action="<?=url."?controller=producto&action=detallesResena"?>" method='post'>
                  <input type='hidden' name='pedido_id' value="<?=$prueba->getPedido_id()?>">
                <button class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="submit">dejar reseña
              </form>
              </div>
            </div>
                <?php } ?>
        </div>
      </div>
        
    </div>
  </section>
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
  <div class="col-12 d-none d-md-block container rounded d-flex justify-content-center align-items-center" id="prueba">
    <a href="#"><img src="assets/images/resenas.png" alt="..."></a>
  </div>
  <section>
    <div class="border container d-flx align-items-center mt-5 d-none d-md-block" style="width: 672px; height: 183px; box-shadow: 5%;">
      <diV class="container text-center mt-3">
        <h3>Newsletter</h3>
      </diV>
      <form>
        <div class="ms-3">
          <label for="exampleInputEmail1" class="newsletter-text form-label">Email</label>
        </div>
        <div class="d-flex ms-3 mb-3">
          
          <input type="email" class="form-control align-items-start" id="exampleInputEmail1"style="width: 502px;" aria-describedby="emailHelp">
          <button type="submit" class="ms-4 boton-sub rounded boton-hover">Enviar</button>
        </div>
        <div class="mb-3 ms-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="newsletter-text form-check-label" for="exampleCheck1">He leído y acepto la política de privacidad</label>
        </div>
      </form>
    </div> 
    </section>
</body>