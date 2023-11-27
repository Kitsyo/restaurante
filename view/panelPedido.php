
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

                </table>
                </br>
                <h1>Tabla Hamburguesas<h1>
                
                    <table border ='1'style="text-align:center">
                    <tr>
                    <th>Categoria ID</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Ingrediente ID</th>
                    <th>Precio</th>
                </tr>

                <?php
                foreach($hamburguesas as $hamburguesa) {
                ?>
                <tr>
                <td><?=$hamburguesa->getCategoria_id()?></td>
                <td><?=$hamburguesa->getNombre_producto()?></td>
                <td><?=$hamburguesa->getCategoria_id()?></td>
                <td><?=$hamburguesa->getIngrediente_id()?></td>
                <td><?=$hamburguesa->getPrecio()?></td>
                <td><button type="button">eliminar</button></td>
                <td><button type="button">modificar</button></td>
                </tr>
                <?php } ?>  
                </table>

                </table>
                </br>
                <h1>Tabla Vegana<h1>
                
                    <table border ='1'style="text-align:center">
                    <tr>
                    <th>Categoria ID</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Ingrediente ID</th>
                    <th>Precio</th>
                </tr>

                <?php
                foreach($veganas as $vegana) {
                ?>
                <tr>
                <td><?=$vegana->getCategoria_id()?></td>
                <td><?=$vegana->getNombre_producto()?></td>
                <td><?=$vegana->getCategoria_id()?></td>
                <td><?=$vegana->getIngrediente_id()?></td>
                <td><?=$vegana->getPrecio()?></td>
                <td><button type="button">eliminar</button></td>
                <td><button type="button">modificar</button></td>
                </tr>
                <?php } ?>  
                </table>

                </table>
                </br>
                <h1>Tabla Sin Gluten<h1>
                
                    <table border ='1'style="text-align:center">
                    <tr>
                    <th>Categoria ID</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Ingrediente ID</th>
                    <th>Precio</th>
                </tr>

                <?php
                foreach($sinGluten as $sinGlut) {
                ?>
                <tr>
                <td><?=$sinGlut->getCategoria_id()?></td>
                <td><?=$sinGlut->getNombre_producto()?></td>
                <td><?=$sinGlut->getCategoria_id()?></td>
                <td><?=$sinGlut->getIngrediente_id()?></td>
                <td><?=$sinGlut->getPrecio()?></td>
                <td><button type="button">eliminar</button></td>
                <td><button type="button">modificar</button></td>
                </tr>
                <?php } ?>  
                </table>
                <form>
                    <td><button type="submit" name="add">+</td>
                    <td><button type="submit" name="dell">-</td>
                </form>
        </body>
    </head>
</html>