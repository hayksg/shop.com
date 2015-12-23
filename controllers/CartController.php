<?php

class CartController
{
    public function actionAdd($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionCountProduct($id)
    {
        $countProduct = Cart::countProductInCart($id);

        if (isset($_POST['price'])) {
            $price = (float)$_POST['price'];
            $amount = $countProduct * $price;
            echo "{$countProduct}|{$amount}";
        }
        return true;
    }

    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $sessionProducts = Cart::returnSessionProducts();
        if ($sessionProducts) {
            $idsArray = array_keys($sessionProducts);
            $products = Product::getProductsInCart($idsArray);
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        return true;
    }

    public function actionOrder()
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $name    = '';
        $phone   = '';
        $message = '';
        $result  = '';

        if (isset($_POST['submit'])) {
            $name    = FunctionLibrary::clearStr($_POST['name']);
            $phone   = FunctionLibrary::clearStr($_POST['phone']);
            $message = FunctionLibrary::clearStr($_POST['message']);

            $errors = array();

            if (!User::checkName($name)) {
                $errors[] = 'Тема должна быть больше 1 символа.';
            }

            if (!User::checkPhone($phone)) {
                $errors[] = 'Невалидный телефон.';
            }

            if (!User::checkName($message)) {
                $errors[] = 'Сообщение не может быть пустым.';
            }

            if (empty($errors)) {

            }
        }

        require_once(ROOT . '/views/cart/order.php');
        return true;
    }
}