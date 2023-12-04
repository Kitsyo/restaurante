<!DOCTYPE html>
<body>
  <section>

        
    <div class="container d-flex justify-content-xl-start mt-4 mb-4 justify-content-md-center justify-content-sm-center ">
      <h2><a href="#"><img class="me-4" src="assets/icons/icono-menu.png" alt="..."></a>Nuestros productos</h2>
    </div>
    <div class="container text-center d-flex justify-content-center ">
      <div class="row">
        <?php
        foreach($entrantes as $entrante){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/img_product/<?=$entrante->getImagen_producto();?>" class="card-img-top d-block" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$entrante->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$nomEntrantes?></a></p>
              <p class="card-text precio-carta"><?=$entrante->getPrecio()?> €</p>
              <form action="<?=url."?controller=producto&action=carta"?>">
                <button class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="submit">Comprar
              </form>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php foreach($postres as $postre){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/macarrones.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$postre->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$postre->getDescripcion()?></a></p>
              <p class="card-text precio-carta"><?=$postre->getPrecio()?> €</p>
              <a href="#" class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="button">Comprar</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php foreach($hamburguesas as $hamburguesa){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/macarrones.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$hamburguesa->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$hamburguesa->getDescripcion()?></a></p>
              <p class="card-text precio-carta"><?=$hamburguesa->getPrecio()?> €</p>
              <a href="#" class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="button">Comprar</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php foreach($veganas as $vegana){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/macarrones.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$vegana->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$vegana->getDescripcion()?></a></p>
              <p class="card-text precio-carta"><?=$vegana->getPrecio()?> €</p>
              <a href="#" class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="button">Comprar</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php foreach($sinGluten as $sinGlu){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/macarrones.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$sinGlu->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$sinGlu->getDescripcion()?></a></p>
              <p class="card-text precio-carta"><?=$sinGlu->getPrecio()?> €</p>
              <a href="#" class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="button">Comprar</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php foreach($desayunos as $desayuno){?>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/macarrones.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?=$desayuno->getNombre_producto()?></p>
              <p><img src="assets/icons/fav2.svg"></p>
              <p><a href="#" class="col card-link link-cat"><?=$desayuno->getDescripcion()?></a></p>
              <p class="card-text precio-carta"><?=$desayuno->getPrecio()?> €</p>
              <a href="#" class="container d-flex justify-content-center align-items-center boton-comp rounded boton-hover" type="button">Comprar</a>
            </div>
          </div>
        </div>
        <?php } ?>
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