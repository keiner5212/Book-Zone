<?php
require_once 'models/category.php';
class CategoryController
{
    public function viewTableCategory()
    {
        $categoryList = (new Category())->getCategoryList();
        require_once('views/admin/tableCategory.php');
    }
    public function deleteTableCategory()
    {
        $category = new Category();
        $category->setIdCategoria($_GET['id']);
        $category->deleteCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }
    public function addTableCategory()
    {
        require_once 'views/admin/addCategory.php';
    }
    public function postFormAddCategory()
    {
        $category = new Category();
        $category->setNombre($_POST['nombre']);
        $category->addCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }
    public function editTableCategory()
    {
        if (!isset($_GET['id_categoria'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            print("<pre>");
            var_dump($_GET);
            print("</pre>");
        }
        $aux = new Category();
        $aux->setIdCategoria($_GET['id_categoria']);
        $category = $aux->getCategoryById();
        require_once "views/admin/editCategory.php";
    }
    public function postConditionCategory()
    {
        $aux = new Category();
        $aux->setIdCategoria($_GET['id_categoria']);
        $category = $aux->getCategoryById();
        if ($category["estado"] == '0') {
            $aux->editConditionCategory($_GET["id_categoria"], 1);
        } else {
            $aux->editConditionCategory($_GET["id_categoria"], 0);
        }
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }
    public function postFormEditCategory()
    {
        $condition = $this->isCondition();
        if ($condition) {
            echo "<script>alert('Faltan campos por rellenar');</script>";
            header("Location: index.php?controller=Admin&action=editCategory&id_categoria=1");
        }
        $category = new Category();
        $category->setIdCategoria($_POST['id_categoria']);
        $category->setNombre($_POST['nombre']);
        $category->editCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }
    public function isCondition(): bool
    {
        return (!isset($_POST['nombre']) || !isset($_POST['id_categoria']));
    }
    public function postFormSearchCategory()
    {
        $category = new Category();
        $category->setNombre($_POST['busqueda']);
        $categoryList = $category->searchCategory();
        require_once "views/admin/tableCategory.php";
    }
    public function getAllCategories()
    {
        $categoryList = (new Category())->getFullCategories();
        return $categoryList;
    }
}