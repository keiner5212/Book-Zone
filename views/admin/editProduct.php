<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Producto</h2>
        <form class="login" action="index.php?c=Admin&a=postEditProduct" method="POST" enctype="multipart/form-data">
            <div class="parent">
                <div class="formGroup">
                    <input type="text" name="id" required="required" readonly id="userDiretion" class="formInput" value=<?php echo $product["id"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">ID:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="text" name="nombre" required="required" id="userDiretion" class="formInput" value=<?php echo $product["nombre"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">Nombre:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="text" name="autor" required="required" id="userDiretion" class="formInput" value=<?php echo $product["autor"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">Autor:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="text" name="descripcion" required="required" id="userDiretion" class="formInput" value="<?php echo($product["descripcion"])?>">
                    <label for="userDirection" class="formLabel">Descripción:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="number" step=".01" required="required" name="precio" id="userDiretion" class="formInput" value=<?php echo $product["precio"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">Precio:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <img class="fotoProduct"  src="data:image/jpg;base64,<?php echo base64_encode($product["foto"]); ?>" />
                    <input type="file" name="fotoP" id="imatge" class="formInput">
                    <label for="userDirection" class="formLabel">Foto:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="number" step="1" required="required" name="stock" id="userDiretion" class="formInput" value=<?php echo $product["stock"]  ?> placeholder=" ">
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
            <p><input type="submit" name="enviar" value="Aceptar" class="formSumbit" /></p>
        </form>
    </div>
</div>