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
<div class="container-fluid header_nav sticky-top">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-md">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?=url."?controller=producto&action=producto"?>#"><img src="assets/images/logo.png" alt="Logo de la pagina web"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbar-toggler">
          <ul class="navbar-nav d-flex justify-content-center align-content-center">
            <li class="nav-item">             <!-- el action del href es necesario para mandar los enlaces a las funciones generadas -->
              <a class="nav-link enlaces" style="color: white;" href="<?=url."?controller=producto&action=producto"?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link enlaces" style="color: white;" href="#">Destacados</a>
            </li>
          </ul>
          <form class="d-flex justify-content-end order-first align-items-center" role="search">
            <input class="form-control me-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <div class=" row m-2">
            <div class="col-12 col-md-6">
            <a class="nav-link" href="<?=url."?controller=producto&action=carrito"?>"><?=count($_SESSION['selecciones'])?><img src="assets/icons/icon-minicart.svg"></a>
            </div>
            <div class="col-12 col-md-6">
              <a class="nav-link" href="#"><img src="assets/icons/icon-myacount.svg"></a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
<a href="#" class="bot_header"><div class="p-2 container-fluid text-center align-content-center bot_header">¿Quieres recoger tu pedido?</div></a>
</header>