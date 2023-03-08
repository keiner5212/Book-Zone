<?php
require_once("database.php");
class Client
{

    private $pdo;
    private $email;
    private $userName;
    private $userLastName;
    private $userDirection;
    private $userNumber;
    private $userDNI;
    private $password;


    //Constructor
    public function __construct($email = null, $name = null, $lastname = null, $direction = null, $number = null, $DNI = null, $password = null)
    {
        $this->email = $email;
        $this->userName = $name;
        $this->userLastName = $lastname;
        $this->userDirection = $direction;
        $this->userNumber = $number;
        $this->userDNI = $DNI;
        $this->password = $password;
        $this->pdo = (new Database())->connect();
    }


    // Getters and Setters
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    public function setUserLastName($userLastName): void
    {
        $this->userLastName = $userLastName;
    }
    public function getUserDirection()
    {
        return $this->userDirection;
    }

    public function setUserDirection($userDirection): void
    {
        $this->userDirection = $userDirection;
    }
    public function getUserDNI()
    {
        return $this->userDNI;
    }

    public function setUserDNI($userDNI): void
    {
        $this->userDNI = $userDNI;
    }
    public function getUserNumber()
    {
        return $this->userNumber;
    }

    public function setUserNumber($userNumber): void
    {
        $this->userNumber = $userNumber;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }


    // Methods
    public function loginAuth()
    {
        $sql = "SELECT * FROM clientes WHERE email = '{$this->getEmail()}' AND password = md5('{$this->getPassword()}')";
        $login = $this->pdo->query($sql);
        if ($login && $login->rowCount() == 1) {
            return $login->fetch()['email'];
        }
        return false;
    }

    public function userSingIn()
    {
        $sql = "INSERT INTO clientes (email, nombre, apellidos, calle, numero, dni, password) VALUES ('{$this->getEmail()}','{$this->getUserName()}','{$this->getUserLastName()}','{$this->getUserDirection()}','{$this->getUserNumber()}','{$this->getUserDNI()}',md5('{$this->getPassword()}'))";
        if ($this->pdo->query($sql)) {
            echo 'si';
        } else {
            echo 'no';
        }
    }

    public function getFullName($email)
    {
        try {
            $query1 = $this->pdo->prepare("SELECT concat(nombre,' ',apellidos) as nc FROM clientes WHERE email = '{$email}';");
            $query1->execute();
            $nombre = $query1->fetch(PDO::FETCH_OBJ);
            return $nombre->nc;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllData($email)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM clientes WHERE email = '{$email}';");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function modifyUser($id)
    {
        $sql = "UPDATE clientes SET email='{$this->getEmail()}', nombre='{$this->getUserName()}', apellidos='{$this->getUserLastName()}', calle='{$this->getUserDirection()}', numero='{$this->getUserNumber()}', dni='{$this->getUserDNI()}' WHERE id = '{$id}';";
        $this->pdo->query($sql);
    }

    public function getHistorico($email)
    {
        try {
            $query1 = $this->pdo->prepare("SELECT * FROM linea_pedido WHERE email_cliente = '{$email}';");
            $query1->execute();
            return $query1->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
