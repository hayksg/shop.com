<?php

class ProductController
{
    public function actionView($id)
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $product = Product::getProductById($id);
        if (!$product) {$product = array();}

        require_once(ROOT . '/views/product/view.php');
        return true;
    }
}