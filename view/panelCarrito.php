<body>
<div>
        <table>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>desc</th>
                <th>precio</th>
                <th>categoria</th>
                <th>imagen</th>
            </tr>

            <?php
            foreach($_SESSION['selecciones'] as $pedido){?>
            <tr>
                <td><?=$pedido->getProducto()->getProducto_id()?></td>
                <td><?=$pedido->getProducto()->getNombre_producto()?></td>
                <td><?=$pedido->getProducto()->getDescripcion()?></td>
                <td><?=$pedido->getProducto()->getPrecio()?></td>
                <td><?=$pedido->getProducto()->getCategoria_id()?></td>
                <td><?=$pedido->getProducto()->getImagen_producto()?></td>
                <!-- Añadimos un boton por fila -->
                <td>
                    <form action=<?=url.'?controller=producto&action=sel'?> method='post'>
                        <input type='hidden' name='id' value= <?=$product->getProducto_id()?>>
                        <input type='hidden' name=''>
                        <input type='hidden' name='id' value= <?=$product->getCategoria_id()?>>
                        <button class="bet-button w3-black w3-section" type="submit">Añadir</button>
                    </form>
                </td>
            </tr>
            <?php
            }?>
        </table>
    </div>
</body>