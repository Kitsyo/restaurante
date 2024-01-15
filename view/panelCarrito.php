<body>
  <div class="container d-flex justify-content-center align-content-center">
    <div class="container d-flex">
      <div class="col-8 container">
        <div class="container row d-flex justify-content-center">
          <div class="col-12 d-flex justify-content-start align-content-center div-pro-tit">
            <table class="table-cart">
              <tr>
                <th class="product">Prodcuto</th>
                <th class="product-quant">Cantidad</th>
                <th class="product-price">Prceio</th>
              </tr>
            </table>
          </div>
          <!--ini-->
          <?php
            foreach($_SESSION['selecciones'] as $pedido1){
                $pedido = unserialize($pedido1);
                $categoriaid = $pedido->getProducto()->getCategoria_id();
                $nomCategoria = productoDAO::getNomCatById($categoriaid);
                ?>
          <div class="col-md-12 d-flex justify-content-start align-content-center mt-4 table-cart">
            <div class="row d-flex align-content-center align-items-center mt-1 mb-1">
              <div class="col-2 foto-cart ">
                <img class="foto-prueb" src="assets/img_product/<?=$pedido->getProducto()->getImagen_producto()?>">
              </div>
              <div class="col-2 text-cart">
                <p class="texto-carrito-prod"><?=$pedido->getProducto()->getNombre_producto()?></p>
                    <p class="texto-carrito-cat"><?=$nomCategoria?></p>
                    <p class="texto-carrito-estandar">Suministrados y entregados por Drim</p>
              </div>
              <div class="col-2 d-flex justify-content-center rounded cant-cart">
                <form action="<?=url."?controller=producto&action=añadirCant"?>" method='post'>
                  <button type="submit" name='Add' value="<?=$pedido->getProducto()->getProducto_id()?>" class="add-cart me-3">+</button>
                  <input class="inp-cart" value="<?=$pedido->getCantidad()?>">
                  <button type="submit" name='Del' value="<?=$pedido->getProducto()->getProducto_id()?>" class="del-cart">-</button>
                </form>
              </div>
              <div class="col-2 price-cart"><?=$pedido->devuelvePrecio()?> €</div>
              <div class="col-2 del-cart">
                <button class="btn-eliminar-prod">X</button>
              </div>
            </div>
          </div>
          <?php
          } ?>
          <!--end-->
        </div>
      </div>
      <?php
            $precioTotal = 0;
            foreach($_SESSION['selecciones'] as $pedido1){
            $pedido = unserialize($pedido1);
            $precioTotal += $pedido->devuelvePrecio();                
            }
            ?>
      <div class="container col-4 ms-4">
        <div class="row">
          <div class="col-12 justify-content-center d-flex p-2"> 
            <div class="d-flex">
              <input class="rounded cell-text-cod" type="text" placeholder="Código">
              <button class="ms-2 btn-codigo boton-hover" name="añadir" role="button">Añadir</button>
            </div>
          </div>
          <div class="col-12 div-carrt pt-3 row">
            <div class="col-6 d-flex justify-content-start">
              <p>Subtotal:</p>
            </div>
            <div class="col-6 d-flex justify-content-end">
              <p><?=$precioTotal?> €</p>
            </div>
          </div>
          <div class="col-12 d-flex align-content-center">
            <div class="col-12 pt-3 row">
              <div class="col-6 d-flex justify-content-start">
                <p class="total-text-cart">Total:</p>
              </div>
              <div class="col-6 d-flex justify-content-end">
                  <p class="num-text-cart"><?=$precioTotal?> €</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-cart-stnd">
          <span>Compra igual o superior a 15€, envío 3,99€</span>
          <span>Compra igual o superior a 60€, envío GRATIS<span>
        </div>
        <div class="d-flex justify-content-center mt-4">
          <a href="<?=url."?controller=producto&action=carta"?>" class="mas-prod">Elegir más productos</a>
        </div>
      <form method='post' action="<?=url."?controller=producto&action=confirmar"?>">
        <div class="d-flex justify-content-center">
          <button class="btn-comp rounded-pill boton-hover mt-2" type="submit" name='confirmar' value="<?=$pedido->getProducto()->getProducto_id()?>">Finalizar compra</button>
          <input class="inp-cart" type="hidden" name='producto_id' value="<?=$pedido->getProducto()->getProducto_id()?>">
          <input class="inp-cart" type="hidden" name='precio_total' value="<?=$pedido->getProducto()->getPrecioTotal()?>">
        </div>
      </form>
      </div>
    </div>
  </div>
</body>