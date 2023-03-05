<?php
require_once("database.php");
class Cart
{
    private $pdo;
    private $emailCliente;
    private $idProducto;
    private $unidades;

    // constructor
    public function __construct($email = null, $product = null, $unity = null)
    {
        $this->emailCliente = $email;
        $this->idProducto = $product;
        $this->unidades = $unity;
        $this->pdo = (new Database)->connect();
    }

    // Getters & Setters
    // ...
    public function getEmailCliente()
    {
        return $this->emailCliente;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getUnidades()
    {
        return $this->unidades;
    }


    // Métodos
    public function saveToCart()
    {
        $sql = "INSERT INTO `carrito` (`id_carrito`, `email_cliente`, `id_producto`, `unidades`) VALUES (NULL, '{$this->getEmailCliente()}', '{$this->getIdProducto()}', '{$this->getUnidades()}');";
        $this->pdo->query($sql);
    }

    public function getFullCart()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM `carrito` WHERE `email_cliente` = '{$this->getEmailCliente()}';");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProductName($id)
    {
        $this->pdo = (new Database)->connect();

        try {
            $query = $this->pdo->prepare("SELECT nombre FROM `productos` WHERE `id` = '{$id}';");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProductImage($id)
    {
        $this->pdo = (new Database)->connect();

        try {
            $query = $this->pdo->prepare("SELECT foto FROM `productos` WHERE `id` = '{$id}';");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteCart()
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM carrito WHERE id_producto={$this->idProducto} AND email_cliente =\"{$this->emailCliente}\"");
            $query->execute();
            echo 'eliminado';
        } catch (Exception $e) {
            echo 'error al borrar';
            die($e->getMessage());
        }
    }

    public function deleteAllCart($emailCliente)
    {
        try {
            $query = $this->pdo->prepare("DELETE FROM carrito WHERE email_cliente =\"{$emailCliente}\"");
            $query->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProductPrice($id)
    {
        $this->pdo = (new Database)->connect();

        try {
            $query = $this->pdo->prepare("SELECT precio FROM `productos` WHERE `id` = '{$id}';");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}







?>