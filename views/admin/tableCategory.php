<section class="tabla">
    <form class="d-flex" action="index.php?c=Admin&a=postSearchCategory&t=Buscar%20categoria" method="POST">
        <a class="b_menu" href="index.php?c=Admin&a=addCategory&t=Añadir%20categoria">Añadir categorias</a>
        <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda">
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
            if (!empty($categoryList)) :
                foreach ($categoryList as $value) foreach ($value as $v) : ?>
                    <tr>
                        <td>
                            <?php echo ($v["id_categoria"]); ?>
                        </td>
                        <td>
                            <?php echo ($v["nombre"]); ?>
                        </td>
                        <td>
                            <a title="Edit" href="index.php?c=Admin&a=editCategory&id_categoria=<?php echo ($v["id_categoria"]);?>&t=Editar%20categoria">
                                <img src="assets/img/img_icons/editar.svg" height='50px' alt="Editar">
                            </a>
                        </td>
                        <td>
                            <?php
                            $urlEstado = "index.php?c=Admin&a=conditionCategory&id_categoria=".$v["id_categoria"];
                            if ($v["estado"] == 1) {
                                echo "<a title='Desactivar' href='$urlEstado'><img src='assets/img/img_icons/tick.svg' height='50px' alt='Activar'></a>";
                            } else {
                                echo "<a title='Activar' href='$urlEstado'><img src='assets/img/img_icons/x.svg' height='50px' alt='Desactivar'></a>";
                            }
                            ?>
                        </td>
                        <td>
                            <a title="Delete" href="index.php?c=Admin&a=deleteCategory&id=<?php echo ($v["id_categoria"]); ?>">
                                <img src="assets/img/img_icons/delete.svg" height='50px' alt="Eliminar">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <td>No hay categorias</td>
            <?php endif ?>
        </tbody>
    </table>
</section>