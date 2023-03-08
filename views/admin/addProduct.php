<div class="center-contenedor-product">
    
    <form action="index.php?c=Admin&a=postAddProduct" class="login" method="POST" enctype="multipart/form-data">
        <div class="parent">
        <h2 class="login-header">Añadir Producto</h2>
            <div class="formGroup">
                <input type="text" name="nombre" required="required" class="formInput">
                <label for="userDirection" class="formLabel">Nombre:</label>
                <span class="formLine"></span>
            </div>
            <div class="formGroup">
                <textarea cols="20" required="required" name="descripcion" class="formInput"></textarea>
                    <label for="userDirection" class="formLabel">Descripción:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="text" name="autor"  required="required" class="formInput">
                    <label for="userDirection" class="formLabel">Autor:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="number" step=".01" name="precio"  required="required" class="formInput">
                    <label for="userDirection" class="formLabel">Precio:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="file" name="fotoP" id="imatge" class="formInput">
                    <label for="userDirection" class="formLabel">Foto:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="number" step="1" name="stock"  required="required" class="formInput">
                    <label for="userDirection" class="formLabel">Stock:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <select name="categorias" class="formInput">
                        <?php
                        if (!empty($categoryList)) :
                            foreach ($categoryList as $value) foreach ($value as $v) :
                                if ((int) $v["estado"] != 0) : ?>
                                    <option value="<?php echo ($v["id_categoria"]); ?>">
                                        <?php echo ($v["nombre"]); ?>
                                    </option>
                                <?php else : ?>
                                <?php endif ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="">no hay categorias</option>
                        <?php endif ?>
                    </select>
                    <label for="userDirection" class="formLabel">Categoria:</label>
                    <span class="formLine"></span>
                </div>
            </div>
            <p><input type="submit" name="enviar" value="Aceptar" class="formSumbit"  /></p>
        </form>
    </div>
<?php
require_once("views/general/footer.php");
?>