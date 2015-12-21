<?php

class CatalogController
{
    public function actionIndex($page = 1)
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $products = Product::getProductsList(9, $page);
        if (!$products) {$products = array();}

        $total = Product::getTotalProducts();
        $pagination = FunctionLibrary::buildPagination($page, $total, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $page = (int)$page;
        $products = Product::getProductsByCategoryId($categoryId, $page);
        if (!$products) {$products = array();}

        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = FunctionLibrary::buildPagination($page, $total, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}