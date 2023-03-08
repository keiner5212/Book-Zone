<?php
echo '<div class="espace"></div>';
foreach ($categories as $ca) :
    echo '<h1 class="catName">' . $ca->nombre . '</h1>';
?>
    <section class="container" id="<?php echo $ca->id_categoria; ?>">
        <?php if (isset($productList)) {
            foreach ($productList as $product) :
                if ($product->estado == 1 && $product->id_categoria == $ca->id_categoria) :
        ?>
                    <section itemscope itemtype="https://schema.org/Book" class="mainMenu">
                        <iframe onload="desplegarImagen(<?php echo ($product->id) ?>)" style="display: none">
                        </iframe>
                        <article class="gallery">
                            <div class="galleryImageContainer<?php echo ($product->id) ?> galleryImageContainer" style='background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'>
                            </div>
                        </article>
                        <article class="details">
                            <h2 itemprop="author" class="detailsAuthor">
                                <?php echo ($product->autor); ?>
                            </h2>
                            <h2 itemprop="name" class="detailsTitle">
                                <?php echo ($product->nombre); ?>
                            </h2>
                            <p  itemprop="description" class="detailsDescription">
                                <?php echo ($product->descripcion); ?>
                            </p>
                            <div itemprop="about" class="detailsPrices">
                                <?php
                                if ($product->precioAnterior != null) {
                                ?>
                                    <p class="detailsNewPrice">
                                        <?php echo ($product->precio); ?>€
                                        <span class="detailsDiscount">-
                                            <?php echo (round($product->precio / $product->precioAnterior, 2) * 100); ?>%
                                        </span>
                                    </p>
                                    <p class="detailsBeforePrice">Antes:
                                        <span class="detailsBeforeLine">
                                            <?php echo ($product->precioAnterior); ?>€
                                        </span>
                                    </p>
                                <?php
                                } else {
                                ?>
                                    <p class="detailsNewPrice">
                                        <?php echo ($product->precio); ?>€
                                    </p>
                                <?php
                                }
                                ?>
                            </div>
                            <iframe onload="anadirCarrito(<?php echo ($product->id); ?>)" style="display: none"></iframe>
                            <div class="detailsQuantity">
                                <div class="detailsInput">
                                    <i class="fa-solid fa-minus detailsInputMinus" id="detailsInputMinus<?php echo ($product->id); ?>"></i>
                                    <input type="text" value="0" class="detailsInputNumber<?php echo ($product->id); ?> detailsInputNumber">
                                    <i class="fa-solid fa-plus detailsInputPlus" id="detailsInputPlus<?php echo ($product->id); ?>"></i>
                                </div>
                                <?php
                                if (isset($_SESSION['client'])) {
                                    if ($product->stock > 0) {
                                        echo '<button class="detailsButton' . $product->id . ' detailsButton"><i class="fa-solid fa-cart-shopping"></i> Añadir a la cesta</button>';
                                    } else {
                                        echo '<button class="detailsButtonDisabled">No hay unidades</button>';
                                    }
                                } else {
                                    echo '<button class="detailsButtonDisabled"><a class="cartLink" href="index.php?log=true&controller=client&action=loginClient">Inicia sesión</a> para comprar</button>';
                                }
                                ?>
                            </div>
                        </article>
                    </section>
                    <div class="modalNoProducts">
                        <div class="modalNoProductsBox">
                            <p class="modalNoProductsP">Selecciona el número de unidades!</p>
                            <button class="modalNoProductsB">ACEPTAR</button>
                        </div>
                    </div>
                    <div class="modalMoreInfo<?php echo ($product->id); ?> modalMoreInfo">
                        <div class="xmark<?php echo ($product->id); ?> xmark">
                            <i class="fa-solid fa-circle-xmark" id="closeMoreInfo"></i>
                        </div>
                        <div class="menuMoreInfo">
                            <h2 class="detailsAuthor">
                                <?php echo ($product->autor); ?>
                            </h2>
                            <h2 class="detailsTitle">
                                <?php echo ($product->nombre); ?>
                            </h2>
                            <article class="gallery">
                                <div class="galleryImageContainerMoreInfo" style=' background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'>
                                </div>
                            </article>
                            <article class="details">
                                <h2 itemprop="genre" class="detailsAuthor">
                                    <?php
                                    $c = new Category;
                                    $c->setIdCategoria($product->id_categoria);
                                    print($c->getCategoryById()["nombre"]);
                                    ?>
                                </h2>
                                <p itemprop="description" class="detailsDescriptionInfo">
                                    <?php echo ($product->descripcion); ?>
                                </p>
                                <?php
                                if ($product->stock > 10) {
                                    echo '<p itemprop="availability" href="https://schema.org/InStock" class="classStock">En stock.</p>';
                                } else if ($product->stock < 5 && $product->stock > 0) {
                                    echo '<p itemprop="availability" href="https://schema.org/InStock" class="classStock">Últimas unidades.</p>';
                                } else {
                                    echo '<p itemprop="availability" href="https://schema.org/InStock" class="classStock">No disponible.</p>';
                                }
                                ?>
                            </article>
                        </div>
                    </div>
                <?php endif; ?>
        <?php endforeach;
        } ?>
    </section>
<?php endforeach; ?>
<div class="arrowUp"><button onclick="catScroll(0)" class="arrowButton"><i class="fa-solid fa-arrow-up"></i>
        <p>Volver arriba</p>
    </button></div>