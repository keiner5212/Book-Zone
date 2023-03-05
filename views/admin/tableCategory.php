<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="tabla">
    <form class="d-flex"
          action="index.php?controller=Admin&action=postSearchCategory"
          method="POST">
        <a class="b_menu"
           href="index.php?controller=Admin&action=addCategory">Añadir categorias</a>
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
                <th>Editar</th>
                <th>Estado</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($categoryList)):
                foreach ($categoryList as $value)foreach ($value as $v): ?>
                        <tr>
                            <td>
                                <?php echo ($v["id_categoria"]); ?>
                            </td>
                            <td>
                                <?php echo ($v["nombre"]); ?>
                            </td>
                            <td>
                                <a title="Edit"
                                   href="index.php?controller=Admin&action=editCategory&id_categoria=<?php echo ($v["id_categoria"]); ?>">
                                    <img src="assets/img/img_icons/editar.svg"
                                         alt="Editar">
                                </a>
                            </td>
                            <td>
                                <?php
                                $urlEstado = "index.php?controller=Admin&action=conditionCategory&id_categoria=" . $v["id_categoria"];
                                if ($v["estado"] == 1) {
                                    echo "<a title='Desactivar' href='$urlEstado'><img src='assets/img/img_icons/tick.svg' alt='Activar'></a>";
                                } else {
                                    echo "<a title='Activar' href='$urlEstado'><img src='assets/img/img_icons/x.svg' alt='Desactivar'></a>";
                                }
                                ?>
                            </td>

                            <td>
                                <a title="Delete"
                                   href="index.php?controller=Admin&action=deleteCategory&id=<?php echo ($v["id_categoria"]); ?>">
                                    <img src="assets/img/img_icons/delete.svg"
                                         alt="Eliminar">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            <?php else: ?>
                <td>No hay categorias</td>
            <?php endif ?>
        </tbody>
    </table>
</section>