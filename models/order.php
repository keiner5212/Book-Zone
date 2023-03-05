<?php
class Order
{
    private $pdo;
    public $elementos;
    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

    public function getOrderList()
    {
        try {
            $consulta = "select * from linea_pedido";
            $resultado = $this->pdo->query($consulta);
            while ($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->elementos[] = $filas;
            }
            return $this->elementos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addOrder($id_productos, $email_cliente, $ListaUnidades, $precio_total)
    {
        try {
            $consult = "INSERT INTO linea_pedido (id_pedido, id_productos, email_cliente, ListaUnidades, precio_total) VALUES (null,?,?,?,?)";
            $query = $this->pdo->prepare($consult);
            $query->execute(array($id_productos, $email_cliente, $ListaUnidades, $precio_total));
            require_once("models/cart.php");
            (new Cart())->deleteAllCart($email_cliente);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}