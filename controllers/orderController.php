<?php
require_once("models/order.php");
class OrderController
{
    public function viewTableOrders()
    {
        $OrderList = (new Order())->getOrderList();
        require_once('views/admin/tableOrders.php');
    }
    public function saveOrder()
    {
        require_once "controllers/cartController.php";
        require_once("models/product.php");
        $client = $_SESSION["client"];
        $productos = "";
        $cantidades = "";
        $precioTotal = 0;
        $aux = new Product();
        $listaCarrito = (new CartController)->getCart();
        foreach ($listaCarrito as $product) {
            $productos = $productos . $product->id_producto . ",";
            $cantidades = $cantidades . $product->unidades . ",";
            $aux->setId($product->id_producto);
            $p = $aux->getProductById();
            $precioTotal = ($precioTotal + ($p["precio"] * $product->unidades));
        }
        $productos = trim($productos, ',');
        $cantidades = trim($cantidades, ',');
        (new Order())->addOrder($productos, $client, $cantidades, $precioTotal);
        echo '<p>¡Gracias por tu compra!</p>';
        echo '<p>Estás siendo redirigido...</p>';
        header("refresh:2.5;url=index.php");
    }

    public function preSaveOrder(){
        require_once "views/client/orderClient.php";
    }
}