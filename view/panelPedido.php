<body>
  <main>
    <section>
      <div class="container" style="height: 504px;">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner rounded">
            <div class="carousel-item active">
              <img src="assets/images/promo1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/promo1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/promo1.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    
</main>
  <section id="destacados">
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
    <div class="container d-flex justify-content-xl-start mt-4 mb-4 justify-content-md-center justify-content-sm-center">
      <h2><a href="#"><img class="me-4" src="assets/icons/Estrella.png" alt="..."></a>Productos estrella</h2>
    </div>
    <div class="container text-center d-flex justify-content-center ">
      <div class="row">
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <a href="#"><img class="img-fluid rounded img-escale" src="assets/images/nachos-toping.png"></a>
        </div>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <a href="#"><img class="img-fluid rounded img-escale" src="assets/images/ice-1500845_1280.svg"></a>
        </div>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <a href="#"><img class="img-fluid rounded img-escale" src="assets/images/tortitas.svg"></a>
        </div>
        <div class="col-md-6 col-xl-3 mb-4 d-flex justify-content-center">
          <a href="#"><img class="img-fluid rounded img-escale" src="assets/images/burger.svg"></a>
        </div>
      </div>
    </div>
  </section>
  <nav>
    <div class="container d-flex justify-content-xl-start mt-4 mb-4 justify-content-md-center justify-content-sm-center">
      <h2><a href="#"><img class="me-4" src="assets/icons/comida.png" alt="..."></a>Categorías</h2>
    </div>
    <div class="container text-center d-flex justify-content-center ">
      <div class="row">
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton1 boton-hv"><?=$nomEntrantes?></button>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton2 boton-hv"><?=$nomPostres?></button>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton3 boton-hv"><?=$nomHamburg?></button>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton4 boton-hv"><?=$nomVeganas?></button>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton5 boton-hv"><?=$nomSinGlu?></button>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 d-flex mt-4 justify-content-center">
            <button type="button" class="boton6 boton-hv"><?=$nomDesayu?></button>
        </div>
      </div>
    </div>
  </nav>
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
</html>