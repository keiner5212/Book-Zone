<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Producto</h2>
        <form class="login"
              action="index.php?controller=Admin&action=postEditProduct"
              method="POST"
              enctype="multipart/form-data">
            <p>ID: <input type="text"
                       readonly
                       name="id"
                       value="<?php echo ($product["id"]); ?>" /></p>
            <p>Nombre: <input type="text"
                       required="required"
                       name="nombre"
                       value="<?php echo ($product["nombre"]); ?>" />
            </p>
            <p>Autor: <input type="text"
                       required="required"
                       name="autor"
                       value="<?php echo ($product["autor"]); ?>" />
            </p>
            <p>Descripción: <input required="required"
                       name="descripcion"
                       value="<?php echo ($product["descripcion"]); ?>"></input></p>
            <p>Precio: <input type="number"
                       step=".01"
                       required="required"
                       name="precio"
                       value="<?php echo ($product["precio"]); ?>" />
            </p>
            <p> Foto:
                <img class="fotoProduct"
                     src="data:image/jpg;base64,<?php echo base64_encode($product["foto"]); ?>" />
                <input type="file"
                       name="fotoP"
                       id="imatge">
            </p>
            <p>Stock: <input type="number"
                       step="1"
                       required="required"
                       name="stock"
                       value="<?php echo ($product["stock"]); ?>" /></p>
            <p>Categoria:
                <select name="categorias">
                    <?php
                    if (!empty($categoryList)):
                        foreach ($categoryList as $value)foreach ($value as $v):
                                if ((int) $v["estado"] != 0): ?>
                                    <option value="<?php echo ($v["id_categoria"]); ?>">
                                        <?php echo ($v["nombre"]); ?>
                                    </option>
                                <?php else: ?>
                                <?php endif ?>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">no hay categorias</option>
                    <?php endif ?>
                </select>
            </p>
            <p><input type="submit"
                       name="enviar"
                       value="Aceptar" /></p>
            </a>
        </form>
    </div>
</div>