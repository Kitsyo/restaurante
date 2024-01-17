<!DOCTYPE html>
<html>
<head>
    <title>Restaurante Drim</title>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets\css\full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>
    <nav class="navbar navbar-expand-md container-fluid header_nav sticky-top">
      <div class="container-fluid d-flex justify-content-center align-items-center">
        <a class="navbar-brand" href="<?=url."?controller=producto&action=producto"?>"><img src="assets/images/logo.png" alt="Logo de la pagina web"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex align-items-center collapse navbar-collapse text-center" id="navbar-toggler">
          <ul class="navbar-nav d-flex justify-content-center align-content-center">
            <li class="nav-item">             <!-- el action del href es necesario para mandar los enlaces a las funciones generadas -->
              <a class="nav-link enlaces" style="color: white;" href="<?=url."?controller=producto&action=carta"?>">Carta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link enlaces" style="color: white;" href="#destacados">Destacados</a>
            </li>
          </ul>
          <form class="d-flex justify-content-center order-first align-items-center" role="search">
            <input class="form-control me-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
            <div class="row m-2 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6">
                    <div class="ms-2 mt-1">
                        <a class="nav-link" href="<?=url."?controller=producto&action=inicioUser"?>"><img src="assets/icons/icon-myacount.svg"></a>
                        <span class="nom-icon"><?=$_SESSION['usuario']->getEmail()?></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="ms-2 mt-1">
                        <a class="nav-link" href="<?=url."?controller=producto&action=carrito"?>"><?php if(count($_SESSION['selecciones'])!=0){ ?> <span class="position-absolute top-55 start-90 translate-middle badge bg-danger"><?=count($_SESSION['selecciones'])?></span> <?php  } ?><img src="assets/icons/icon-minicart.svg"></a>
                        <span class="nom-icon">Comprar</span>
                    </div>
              </div>
          </div>
        </div>
      </div>
    </nav>
<a href="#" class="bot_header"><div class="p-2 container-fluid text-center align-content-center bot_header">¿Quieres recoger tu pedido?</div></a>
</header>