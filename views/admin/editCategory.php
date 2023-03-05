<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Categoria</h2>
        <form action="index.php?controller=Admin&action=postEditCategory"
              class="login"
              method="POST">
            <p>ID_Categoria: <input type="text"
                       readonly
                       name="id_categoria"
                       value="<?php echo ($category["id_categoria"]); ?>" /></p>
            <p>Nombre: <input type="text"
                       required=""
                       name="nombre"
                       value="<?php echo ($category["nombre"]); ?>" />
            </p>
            <p><input type="submit"
                       value="Aceptar" /></p>
            </a>
        </form>
    </div>
</div>