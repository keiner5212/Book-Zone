<main class="clientMain">
    <h3>Pedidos de <span class="clientName">' <?php echo $clientName; ?> '</span></h3>
    <hr class="clientLine">
    <table class="clientTable">
        <?php
        if (!empty($datos)) { ?>
            <tr>
                <th>Productos</th>
                <th>Unidades</th>
                <th>Precio total</th>
            </tr>
            <?php
            foreach ($datos as $dato) : ?>
                <tr>
                    <td><?php echo ($dato->id_productos); ?></td>
                    <td><?php echo ($dato->ListaUnidades); ?></td>
                    <td><?php echo ("$" . $dato->precio_total); ?></td>
                </tr>
        <?php
            endforeach;
        } else {
            echo ("No hay pedidos");
        } ?>
    </table>
</main>