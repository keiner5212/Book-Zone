<?php
echo '
<main class="clientMain">

    <h3>Pedidos de <span class="clientName">' . $clientName . '</span></h3>
    <hr class="clientLine">
    <table class="clientTable">
        <tr>
            <th>Pedido</th>
            <th>Unidades</th>
            <th>Precio total</th>
        </tr>';
if ("1" == 1) {
    
    // echo $datos->id_productos;

    foreach($datos as $dato):

        echo '<tr>';
        echo'<td>'.( $dato->id_productos).'</td>';
        echo'<td>'.( $dato->ListaUnidades).'</td>';
        echo'<td>'.( $dato->precio_total).'</td>';
        echo '</tr>';


    endforeach;


} else {
    ?>
    echo 'No hay pedidos';

<?php



}
echo '</table></main>';
?>