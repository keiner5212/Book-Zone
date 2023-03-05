<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="tabla">
    <form class="d-flex"
          action="index.php?controller=Admin&action=postSearchProduct"
          method="post">
        <div class="b-left">
            <a class="b_menu"
               href="index.php?controller=Admin&action=viewTableCategory">Categorias</a>
            <a class="b_menu"
               href="index.php?controller=Admin&action=addProduct">Añadir libro</a>
            <a class="b_menu"
               href="index.php?controller=Admin&action=viewTableOrders">Lista de Pedidos</a>
        </div>
        <input class="buscar-form"
               type="search"
               placeholder="Busca el nombre"
               name="busqueda">
    </form>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Desactivar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($productList)):
                foreach ($productList as $v): ?>
                    <tr>
                        <td>
                            <?php echo ($v->id); ?>
                        </td>
                        <td>
                            <?php echo ($v->nombre); ?>
                        </td>
                        <td>
                            <?php echo ($v->descripcion); ?>
                        </td>
                        <td>
                            <?php echo ("$" . $v->precio); ?>
                        </td>
                        <td><img class="fotoProduct"
                                 src="data:image/jpg;base64,<?php echo base64_encode($v->foto); ?>" />
                        </td>
                        <td>
                            <?php echo ($v->stock); ?>
                        </td>
                        <td>
                            <?php
                            if ($v->id_categoria != null) {
                                echo ($v->id_categoria);
                            } else {
                                echo ("null");
                            }
                            ?>
                        </td>
                        <td>
                            <a title="Edit"
                               href="index.php?controller=Admin&action=editProduct&id=<?php echo ($v->id); ?>">
                                <img src="assets/img/img_icons/editar.svg"
                                     alt="Editar">
                            </a>
                        </td>
                        <td>
                            <?php
                            $urlEstado = "index.php?controller=Admin&action=conditionProduct&id=" . $v->id;
                            if ($v->estado == 1) {
                                echo "<a title='Desactivar' href='$urlEstado'><img src='assets/img/img_icons/tick.svg' alt='Activar'></a>";
                            } else {
                                echo "<a title='Activar' href='$urlEstado'><img src='assets/img/img_icons/x.svg' alt='Desactivar'></a>";
                            }
                            ?>
                        </td>
                        <td>
                            <a title="Delete"
                               href="index.php?controller=Admin&action=deleteProduct&id=<?php echo ($v->id); ?>">
                                <img src="assets/img/img_icons/delete.svg"
                                     alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <td>No hay productos</td>
            <?php endif ?>
        </tbody>
    </table>
</section>