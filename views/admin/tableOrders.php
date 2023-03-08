<section class="tabla">
    <form class="d-flex" action="index.php?c=Admin&a=postSearchOrder&t=Pedidos" method="POST">
        <input class="buscar-form" type="search" placeholder="Busca el email del cliente" name="busqueda">
    </form>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID del pedido</th>
                <th>Email Cliente</th>
                <th>ID Productos</th>
                <th>Unidades (respectivamente)</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($OrderList)) :
                foreach ($OrderList as $value) foreach ($value as $v) : ?>
                    <tr>
                        <td>
                            <?php
                            echo ($v["id_pedido"])
                            ?>
                        </td>
                        <td>
                            <?php
                            echo ($v["email_cliente"])
                            ?>
                        </td>
                        <td>
                            <?php
                            echo ($v["id_productos"])
                            ?>
                        </td>
                        <td>
                            <?php
                            echo ($v["ListaUnidades"])
                            ?>
                        </td>
                        <td>
                            <?php
                            echo ($v["precio_total"])
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <td>No hay pedidos</td>
            <?php endif ?>
        </tbody>
    </table>
</section>