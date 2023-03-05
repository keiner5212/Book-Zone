<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Book Zone</title>
    <link rel="stylesheet"
          href="assets/style/style.css">
    <link rel="shortcut icon"
          href="assets/img/img_general/logo.png" />
    <script src="assets/script/main.js"></script>
    <script src="https://kit.fontawesome.com/ebca16e450.js"
            crossorigin="anonymous"></script>
</head>

<body onload="responsiveMenu()">
    <?php
    session_start();
    require_once "autoload.php";
    require_once "views/general/header.php";
    if (isset($_GET['controller'])) {
        $nameController = $_GET['controller'] . "Controller";
    } else {
        $nameController = "clientController";
    }
    if (class_exists($nameController)) {
        $controler = new $nameController();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "showMain";
        }
        $controler->$action();
    } else {
        echo "No existe el controlador";
    }
    require_once "views/general/footer.php";
    ?>
</body>

</html>