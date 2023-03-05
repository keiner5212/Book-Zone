<?php
require_once "models/client.php";
class ClientController
{
    private function checkClient(): void
    {
        if (!isset($_SESSION['client'])) {
            header('Location: index.php?log=true&controller=client&action=loginClient');
        }
    }
    public function loginClient()
    {
        require_once 'views/client/loginClient.php';
    }
    public function loginAuth()
    {
        if (!isset($_POST['client']) || !isset($_POST['password'])) {
            header('Location: index.php?log=true&controller=client&action=loginClient');
        }
        $client = new Client();
        $client->setEmail($_POST['client']);
        $client->setPassword($_POST['password']);
        $login = $client->loginAuth();
        if ($login) {
            $_SESSION['client'] = $login;
            header('Location: index.php');
        } else {
            header('Location: index.php?log=false&controller=client&action=loginClient');
        }
    }
    public function menuClient()
    {
        $this->checkClient();
        $client = new Client();
        $clientName = $client->getFullName($_SESSION['client']);
        $datos = $client->getHistorico($_SESSION['client']);
        require_once 'views/client/menuClient.php';
    }
    public function closeClient()
    {
        unset($_SESSION['client']);
        echo '<script>window.location.replace("index.php")</script>';

    }
    public function registerClient()
    {
        require_once 'views/client/registerClient.php';
    }
    public function singInClient()
    {
        if (isset($_POST['userDNI'])) {
            $email = $_POST['userMail'];
            $userName = $_POST['userName'];
            $lastName = $_POST['userLastName'];
            $userDiretion = $_POST['userDiretion'];
            $userNumber = $_POST['formNumber'];
            $userDNI = $_POST['userDNI'];
            $password = $_POST['userPass'];
            $client = new Client($email, $userName, $lastName, $userDiretion, $userNumber, $userDNI, $password);
            $client->userSingIn();
        } else {
            header('Location: index.php?log=true&controller=client&action=loginClient');
        }
    }
    public function showMain()
    {
        require_once "models/product.php";
        require_once 'productController.php';
        $productController = new ProductController();
        $productList = (new Product())->getProductList();
        require_once "views/general/menu.php";
    }
    public function viewTableProduct()
    {
    }
    public function showModifyClient()
    {
        $this->checkClient();
        $client = new Client();
        $cliente = $client->getAllData($_SESSION['client']);
        require_once 'views/client/modifyClient.php';
    }
    public function modifyClient()
    {
        if (isset($_POST['userDNI'])) {
            $email = $_POST['userMail'];
            $userName = $_POST['userName'];
            $lastName = $_POST['userLastName'];
            $userDiretion = $_POST['userDiretion'];
            $userNumber = $_POST['formNumber'];
            $userDNI = $_POST['userDNI'];
            $id = $_SESSION['id'];
            $client = new Client($email, $userName, $lastName, $userDiretion, $userNumber, $userDNI);
            if ($client->modifyUser($id)) {
                header('Location: index.php');
                unset($_SESSION['id']);
            }
            header('Location: index.php');
        } else {
            header('Location: index.php?log=true&controller=client&action=loginClient');
        }
    }

    public function showOffers() {
        require_once "models/product.php";
        require_once 'productController.php';
        $productController = new ProductController();
        $productList = (new Product())->getOffersList();
        require_once "views/general/offers.php";
    }
}