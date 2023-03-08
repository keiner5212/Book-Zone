<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="language" content="spanish">
    <meta name="author" content="Book Zone">
    <meta name="audience" content="all">
    <meta name="descripcion" content="La pagina en la que puedes comprar tus libros preferidos, somos lo que buscas.">
    <meta name="keywords" content="libros,Compra de libros,Libros en línea,Mejores libros,Ofertas de libros,Envío gratis,Temas de libros,Autores famosos">
    <meta name="category" content="Books">
    <meta itemprop="image" content="assets/img/img_general/logo2.png">
    <meta itemprop="name" content="Book Zone">
    <title>
        <?php
        if (isset($_GET["t"])) {
            echo ($_GET["t"]);
        } else {
            echo ("Book Zone");
        }
        ?>
    </title>
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="icon" href="assets/img/img_general/logo2.png" />
    <script src="assets/script/main.js"></script>
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>
</head>

<body onload="responsiveMenu()">
    <?php
    session_start();
    require_once "autoload.php";
    require_once "views/general/header.php";
    if (isset($_GET['c'])) {
        $nameController = $_GET['c'] . "Controller";
    } else {
        $nameController = "clientController";
    }
    if (class_exists($nameController)) {
        $controler = new $nameController();
        if (isset($_GET['a'])) {
            $action = $_GET['a'];
        } else {
            $action = "showMain";
        }
        $controler->$action();
    } else {
        echo "No existe el controlador";
    }
    require_once "views/general/footer.php";
    ?>
    </div>

</body>

</html>

<script type="application/ld+json">
    {
        "@context": [
            "https://schema.org",
            {
                "@language": "es-es"
            }
        ],
        "@type": "Library",
        "address": {
            "@id": "_:book_zone_library_1",
            "@type": "PostalAddress",
            "addressCountry": "Spain",
            "contactType": "Mailing address",
            "postalCode": "28",
            "streetAddress": "School of Education - Music Resource Centre Laurentian University"
        },
        "email": "dudas@bookzone.es",
        "location": {
            "@id": "_:book_zone_library_1"
        },
        "name": "Book Zone",
        "parentOrganization": "https://laurentian.concat.ca/eg/opac/library/LUSYS",
        "telephone": "930 000 000",
        "image": "assets/img/img_general/logo2.png"
    }
</script>