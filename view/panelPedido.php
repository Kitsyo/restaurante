
<html>
    <head>
        <body>
            <h1>Tabla Entrantes<h1>
                <table border='1' style="text-align: center">
                <tr>
                    <th>Categoria ID</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Ingrediente ID</th>
                    <th>Precio</th>
                </tr>
                <?php
                foreach($entrantes as $entrante) {
                ?>
                <tr>
                <td><?=$entrante->getCategoria_id()?></td>
                <td><?=$entrante->getNombre_producto()?></td>
                <td><?=$entrante->getCategoria_id()?></td>
                <td><?=$entrante->getIngrediente_id()?></td>
                <td><?=$entrante->getPrecio()?></td>
                <td><button type="button">eliminar</button></td>
                <td><button type="button">modificar</button></td>
                </tr>
                <?php } ?>  
                </table>
                </br>
                <h1>Tabla postres<h1>
                
                    <table border ='1'style="text-align:center">
                    <tr>
                    <th>Categoria ID</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Ingrediente ID</th>
                    <th>Precio</th>
                </tr>

                <?php
                foreach($postres as $postre) {
                ?>
                <tr>
                <td><?=$postre->getCategoria_id()?></td>
                <td><?=$postre->getNombre_producto()?></td>
                <td><?=$postre->getCategoria_id()?></td>
                <td><?=$postre->getIngrediente_id()?></td>
                <td><?=$postre->getPrecio()?></td>
                <td><button type="button">eliminar</button></td>
                <td><button type="button">modificar</button></td>
                </tr>
                <?php } ?>  
                </table>
        </body>
    </head>
</html>