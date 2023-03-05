<?php

echo '<header class="menu">
    <nav class="menuContainer">
        <a href="index.php" class="menuLogo"><img src="assets/img/img_general/logo.png" alt="" srcset=""><a>
        
        <ul class="menuLinks">
            <li class="menuItem">
                <a href="index.php" class="menuLink"><i class="fa-solid fa-house"></i></a>
            </li>
            <li class="menuItem menuItemShow">
            <button class="menuLinkCat"><p>Categorías</p><i class="fa-solid fa-angle-up" id="menuArrow"></i></button>
            <ul class="menuNesting">
            <li class="menuItem">';
require_once "controllers/categoryController.php";
$cat = new CategoryController;
$categories = $cat->getAllCategories();
foreach ($categories as $ca):

    echo '
                <li class="menuInside">
                <button onclick="catScroll('.$ca->id_categoria.')" class="menuLinkInside">' . $ca->nombre . '</button>
                </li>';
endforeach;
echo '
            </ul>
            </li>
                    <a href="index.php?controller=client&action=showOffers" class="menuLink">Ofertas</a>
                </li>
                <li class="menuItem">
                <button class="menuLink" id="cartShopContainer"><i class="fa-solid fa-cart-shopping" id="cartShopButton"></i></button>
            </li>
        ';
if (!isset($_SESSION['client'])) {

    echo '   <li class="menuItem">
        <a href="index.php?log=true&controller=client&action=loginClient" class="menuLink"><p>Acceder</p></i></a>
        </li>
        <li class="menuItem">
        <a href="index.php?controller=client&action=registerClient" class="menuLink"><div class="menuLinkContainer"><p>Registrarse</p></div></a>';
} else {
    echo '

    <li class="menuItem menuItemShow">
    <a href="#" class="menuLink"><i class="fa-solid fa-circle-user" id="userIcon"></i></a>
    <ul class="menuNesting">
    <li class="menuInside">
        <a href="index.php?controller=client&action=menuClient" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-user"></i></div></a>
    </li>
    <li class="menuInside">
        <a href="index.php?controller=client&action=showModifyClient" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-gear"></i></div></a>
    </li>
    <li class="menuInside">
        <a href="index.php?&controller=client&action=closeClient" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-right-from-bracket"></div></i></a>
        </li>
    </ul>
</li>

        ';
}


echo '
            </li>
            </ul>
            
            <menu class="menuCart"><i class="fa-solid fa-cart-shopping" id="cartShopContainer2"></i></menu>
            <menu class="menuDisplay"><i class="fa-solid fa-bars" id="menuBars"></i></menu>
            
            </nav>
            
        <div class="cartModal">
            <p class="cartModalTitle">Cesta</p>
            <div class="cartModalCheckoutContainer">';
if (isset($_SESSION['client'])) {
    require_once "controllers/cartController.php";
    $cartObj = new CartController;
    $carrito = $cartObj->getCart();
    foreach ($carrito as $cart):

        echo '<div class="cartModalDetailsContainer">
        <img src="data:image/jpg;base64,';
        echo base64_encode($cartObj->getImage($cart->id_producto)->foto);
        echo '" class="cartModalImg">';
        echo '<div>
                        <p class="cartModalProduct">';
        echo ($cartObj->getProduct($cart->id_producto)->nombre);
        echo '</p>
                        <p class="cartModalPrice">' . $cartObj->getPrice($cart->id_producto)->precio . '€ x ' . $cart->unidades . ' <span class="cartModalPriceBold">' . ($cartObj->getPrice($cart->id_producto)->precio) * $cart->unidades . '€</span></p>
                        </div>
                        <div id="' . $cart->id_producto . '"></div>
                        <button class="deleteButton' . $cart->id_producto . ' deleteButton"><i class="fa-solid fa-trash-can" ></i></button>
                    </div>';
    endforeach;
    ?>
    <button class="cartModalButton">Comprar</button>

    <?php

} else {
    ?>
    <p><a class="cartLink"
           href="index.php?log=true&controller=client&action=loginClient">Inicia sesión</a> para usar la
        cesta de la compra.</p>
    <?php
}
echo '
            </div>
        </div>
    </header>';
?>