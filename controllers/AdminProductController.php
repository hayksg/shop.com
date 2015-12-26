<?php

class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        $allProducts = Product::getAllProducts();
        if (!$allProducts) {$allProducts = array();}

        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }

    public function actionCreate()
    {

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    public function actionUpdate()
    {

        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        $product = Product::getProductById($id, false);
        if (!$product) {$product = array();}

        if (isset($_POST['submit'])) {
            Product::deleteProduct($id);
            FunctionLibrary::redirectTo('/admin/product');
        }

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }
}