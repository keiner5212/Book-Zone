<header class="menu">
    <nav class="menuContainer">
        <a href="index.php" class="menuLogo">
            <img src="assets/img/img_general/logo2.png" width="90px" alt="" srcset="">
            <a>
                <ul class="menuLinks">
                    <?php if (!isset($_SESSION['admin'])) { ?>
                        <li class="menuItem">
                            <a href="index.php" class="menuLink"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="menuItem menuItemShow">
                            <button class="menuLinkCat">
                                <p>Categorías</p><i class="fa-solid fa-angle-up" id="menuArrow"></i>
                            </button>
                            <ul class="menuNesting">
                                <li class="menuItem">
                                    <?php
                                    $cat = new CategoryController;
                                    $categories = $cat->getAllCategories();
                                    foreach ($categories as $ca) : ?>
                                <li class="menuInside">
                                    <button onclick=catScroll(<?php echo $ca->id_categoria ?>) class="menuLinkInside"><?php echo $ca->nombre; ?></button>
                                </li>
                            <?php
                                    endforeach; ?>
                            </ul>
                        </li>
                        <a href="index.php?c=client&a=showOffers&t=Ofertas" class="menuLink">Ofertas</a>
                        </li>
                        <li class="menuItem">
                            <button class="menuLink" id="cartShopContainer"><i class="fa-solid fa-cart-shopping" id="cartShopButton"></i></button>
                        </li>
                        <?php
                        if (!isset($_SESSION['client'])) { ?>
                            <li class="menuItem">
                                <a href="index.php?log=true&c=client&a=loginClient&t=Inicia%20sesion" class="menuLink">
                                    <p>Acceder</p></i>
                                </a>
                            </li>
                            <li class="menuItem">
                                <a href="index.php?c=client&a=registerClient&t=Registrate" class="menuLink">
                                    <div class="menuLinkContainer">
                                        <p>Registrarse</p>
                                    </div>
                                </a>
                            <?php
                        } else { ?>
                            <li class="menuItem menuItemShow">
                                <a href="" class="menuLink"><i class="fa-solid fa-circle-user" id="userIcon"></i></a>
                                <ul class="menuNesting">
                                    <li class="menuInside">
                                        <a href="index.php?c=client&a=menuClient&t=Pedidos" class="menuLinkInside">
                                            <div class="menuInsideIcons"><i class="fa-solid fa-user"></i></div>
                                        </a>
                                    </li>
                                    <li class="menuInside">
                                        <a href="index.php?c=client&a=showModifyClient&t=Editar%20Informacion" class="menuLinkInside">
                                            <div class="menuInsideIcons"><i class="fa-solid fa-gear"></i></div>
                                        </a>
                                    </li>
                                    <li class="menuInside">
                                        <a href="index.php?&c=client&a=closeClient" class="menuLinkInside">
                                            <div class="menuInsideIcons"><i class="fa-solid fa-right-from-bracket"></div></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        } ?>
                        </li>
                    <?php } else { ?>
                        <li class="menuItem">
                            <a href="index.php?c=Admin&a=menuAdmin" class="menuLink"><i class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="menuItem">
                            <a class="menuLink" href="index.php?c=Admin&a=viewTableCategory&t=Categorias">Categorias</a>
                        </li>
                        <li class="menuItem">
                            <a class="menuLink" href="index.php?c=Admin&a=viewTableOrders&t=Pedidos">Pedidos</a>
                        </li>
                        <li class="menuInside">
                            <a href="index.php?c=Admin&a=closeAdmin" class="menuLinkInside">
                                <div class="menuInsideIcons"><i class="fa-solid fa-right-from-bracket"></div></i>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <menu class="menuCart"><i class="fa-solid fa-cart-shopping" id="cartShopContainer2"></i></menu>
                <menu class="menuDisplay"><i class="fa-solid fa-bars" id="menuBars"></i></menu>
    </nav>
    <div class="cartModal">
        <p class="cartModalTitle">Cesta</p>
        <div class="cartModalCheckoutContainer">
            <?php
            if (isset($_SESSION['client'])) {
                require_once "controllers/cartController.php";
                $cartObj = new CartController;
                $carrito = $cartObj->getCart();
                foreach ($carrito as $cart) : ?>
                    <div class="cartModalDetailsContainer">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($cartObj->getImage($cart->id_producto)->foto); ?>" class="cartModalImg">
                        <div>
                            <p class="cartModalProduct">
                                <?php echo ($cartObj->getProduct($cart->id_producto)->nombre); ?>
                            </p>
                            <p class="cartModalPrice"><?php echo ($cartObj->getPrice($cart->id_producto)->precio . '€ x ' . $cart->unidades . ' <span class="cartModalPriceBold">' . ($cartObj->getPrice($cart->id_producto)->precio) * $cart->unidades . '€</span>'); ?></p>
                        </div>
                        <div id=<?php echo ($cart->id_producto); ?>></div>
                        <?php echo ('<button class="deleteButton' . $cart->id_producto . ' deleteButton"><i class="fa-solid fa-trash-can" ></i></button>') ?>
                    </div>
                <?php endforeach;
                ?>
                <button class="cartModalButton">Comprar</button>
            <?php
            } else {
            ?>
                <p><a class="cartLink" href="index.php?log=true&c=client&a=loginClient&t=Inicia%20sesion">Inicia sesión</a> para usar la
                    cesta de la compra.</p>
            <?php } ?>
        </div>
    </div>
</header>