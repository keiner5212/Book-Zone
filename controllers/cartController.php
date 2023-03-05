<?php
require_once "models/cart.php";
class CartController
{
    public function addToCart()
    {
        if (isset($_GET["product"])) {
            $client = $_SESSION["client"];
            $product = $_GET["product"];
            $number = $_GET["number"];
            $cart = new Cart($client, $product, $number);
            $cart->saveToCart();
            echo '<script>window.location.replace("index.php")</script>';
        } else {
            header('Location: index.php');
        }
    }
    public function deleteAnCart()
    {
        if (isset($_GET["product"])) {
            $client = $_SESSION["client"];
            $product = $_GET["product"];
            $cart = new Cart($client, $product, 0);
            $cart->deleteCart();
            echo '<script>window.location.replace("index.php")</script>';
        } else {
            echo '<script>window.location.replace("index.php")</script>';
        }
    }
    public function getCart()
    {
        $client = $_SESSION["client"];
        $cart = new Cart($client);
        return $cart->getFullCart();
    }
    public function getProduct($id)
    {
        $cart = new Cart();
        return $cart->getProductName($id);
    }
    public function getImage($id)
    {        $cart = new Cart();
        return $cart->getProductImage($id);
    }
    public function getPrice($id)
    {
        $cart = new Cart();
        return $cart->getProductPrice($id);
    }
}
