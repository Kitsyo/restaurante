<body>
<div>
    
        <table class=" table table-striped-columns">
            <tr>
                <th>Producto</th>
                <th></th>
                <th>Cantidad</th>
                <th>precio</th>
            </tr>

            <?php
            foreach($_SESSION['selecciones'] as $pedido1){
                $pedido = unserialize($pedido1);
                $categoriaid = $pedido->getProducto()->getCategoria_id();
                $nomCategoria = productoDAO::getNomCatById($categoriaid);
                ?>
            <tr>
                <td><img class="img-table" src="assets/img_product/<?=$pedido->getProducto()->getImagen_producto()?>" alt="..."></td>
                <td>
                    <p class="texto-carrito-prod"><?=$pedido->getProducto()->getNombre_producto()?></p>
                    <p class="texto-carrito-cat"><?=$nomCategoria?></p>
                    <p class="texto-carrito-estandar">Suministrados y entregados por Drim</p>
                </td>
                <td><?=$pedido->getCantidad()?></td>
                <td><?=$pedido->getProducto()->getPrecio()?> €</td>
                <!-- Añadimos un boton por fila -->
                <td>
                    <form action=<?=url.'?controller=producto&action=sel'?> method='post'>
                        <input type='hidden' name='producto_id'>
                        <button class="bet-button w3-black w3-section" type="submit">Añadir</button>
                    </form>
                </td>
            </tr>
            <?php
            }?>
        </table>
    </div>
</body>