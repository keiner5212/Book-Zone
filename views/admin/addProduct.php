<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Añadir Producto</h2>
        <form action="index.php?controller=Admin&action=postAddProduct"
              class="login"
              method="POST"
              enctype="multipart/form-data">
            <p>Nombre: <input type="text"
                       required="required"
                       placeholder="Ingresa el nombre..."
                       name="nombre" /></p>
            <p>Descripción: <textarea cols="20"
                          required="required"
                          placeholder="Ingresa la descripcion..."
                          name="descripcion"></textarea></p>
            <p>Autor: <input type="text"
                       required="required"
                       placeholder="Ingresa el autor..."
                       name="autor" /> </p>
            <p>Precio: <input type="number"
                       step=".01"
                       required="required"
                       placeholder="Ingresa el precio..."
                       name="precio" /> </p>
            <p>Foto:<input type="file"
                       name="fotoP"
                       required="required"></p>
            <p>Stock: <input type="number"
                       step="1"
                       required="required"
                       name="stock"
                       placeholder="Ingresa el stock..." /> </p>
            <p>Categoria:
                <select name="categorias">
                    <?php
                    if (!empty($categoryList)):
                        foreach ($categoryList as $value)foreach ($value as $v):
                                if ((int) $v["estado"] != 0): ?>
                                    <option value="<?php echo ($v["id_categoria"]); ?>"><?php echo ($v["nombre"]); ?></option>
                                <?php else: ?>
                                <?php endif ?>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <option value="-1">no hay categorias</option>
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


<?php
require_once("views/general/footer.php");
?>