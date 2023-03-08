<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Categoria</h2>
        <form action="index.php?c=Admin&a=postEditCategory" class="login" method="POST">
            <div class="parent">
                <div class="formGroup">
                    <input type="text" name="nombre" id="userDiretion" class="formInput" value=<?php echo $category["nombre"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">Nombre:</label>
                    <span class="formLine"></span>
                </div>
                <div class="formGroup">
                    <input type="text" readonly name="id_categoria" id="userDiretion" class="formInput" value=<?php echo $category["id_categoria"]  ?> placeholder=" ">
                    <label for="userDirection" class="formLabel">ID_Categoria:</label>
                    <span class="formLine"></span>
                </div>
            </div>
            <p><input type="submit" value="Aceptar" class="formSumbit" /></p>
        </form>
    </div>
</div>