<?php
require_once "models/product.php";
require_once 'models/category.php';
class ProductController
{
    public function viewTableProduct()
    {
        $productList = (new Product())->getProductList();
        require_once "views/admin/menuAdmin.php";
    }
    public function addTableProduct()
    {
        $categoryList = (new Category())->getCategoryList();
        require_once "views/admin/addProduct.php";
    }
    public function deleteTableProduct()
    {
        $aux = new Product();
        $aux->setId($_GET['id']);
        $aux->deleteProduct();
        echo '<script>window.location.replace("index.php?c=Admin&a=menuAdmin")</script>';
    }
    public function editTableProduct()
    {
        if (!isset($_GET['id'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            echo '<script>window.location.replace("index.php?c=Admin&a=menuAdmin")</script>';
        }
        $aux = new Product();
        $aux->setId($_GET['id']);
        $product = $aux->getProductById();
        $categoryList = (new Category())->getCategoryList();
        require_once "views/admin/editProduct.php";
    }
    public function postFormAddProduct()
    {
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setPrecio($_POST['precio']);
        $product->setAutor($_POST['autor']);
        try {
            $tmp_nom = $_FILES["fotoP"]['tmp_name'];
        } catch (Throwable $th) {
            echo "<script>alert('Error al subir el archivo');</script>";
        }
        $product->setFoto(file_get_contents($tmp_nom));
        $product->setStock($_POST['stock']);
        $product->setIdCategoria(intval($_POST['categorias']));
        $product->addProduct();
        echo '<script>window.location.replace("index.php?c=Admin&a=menuAdmin")</script>';
    }
    public function postFormEditProduct()
    {
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setAutor($_POST['autor']);
        $product->setPrecio($_POST['precio']);
        $product->setStock($_POST['stock']);
        $product->setIdCategoria($_POST['categorias']);
        $product->setId($_POST['id']);
        try {
            $tmp_nom = $_FILES["fotoP"]['tmp_name'];
            $product->setFoto(file_get_contents($tmp_nom));
            $aux = True;
        } catch (Throwable $th) {
            $aux = False;
        }
        if ($aux) {
            $product->editProduct();
        } else {
            $product->editProductNoFoto();
        }
        echo '<script>window.location.replace("index.php?c=Admin&a=menuAdmin")</script>';
    }
    public function isCondition(): bool
    {
        return (!isset($_POST['nombre']) || !isset($_POST['descripcion']) || !isset($_POST['precio']) || !isset($_POST['stock']) || !isset($_POST['id_categoria']));
    }
    public function postConditionProduct()
    {
        $aux = new Product();
        $aux->setId($_GET['id']);
        $product = $aux->getProductById();
        if ($product["estado"] == '0') {
            $aux->editConditionProduct($_GET['id'], 1);
        } else {
            $aux->editConditionProduct($_GET['id'], 0);
        }
        echo '<script>window.location.replace("index.php?c=Admin&a=menuAdmin")</script>';
    }
    public function postFormSearchProduct()
    {
        $product = new Product();
        $product->setNombre($_POST['busqueda']);
        $productList = $product->searchProduct();
        require_once "views/admin/menuAdmin.php";
    }
}