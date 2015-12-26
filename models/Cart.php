<?php

class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        if ($id) {
            $productsInCart = array();

            if (isset($_SESSION['products'])) {
                $productsInCart = $_SESSION['products'];
            }

            if (array_key_exists($id, $productsInCart)) {
                $productsInCart[$id]++;
            } else {
                $productsInCart[$id] = 1;
            }

            $_SESSION['products'] = $productsInCart;
            return self::countProductsInCart();
        }
    }

    public static function countProductsInCart()
    {
        if (isset($_SESSION['products'])) {
            $total = 0;
            foreach ($_SESSION['products'] as $quantity) {
                $total += $quantity;
            }
            return $total;
        } else {
            return 0;
        }
    }

    public static function countProductInCart($id)
    {
        if (isset($_SESSION['products'][$id])) {
            return $_SESSION['products'][$id];
        } else {
            return 0;
        }
    }

    public static function returnSessionProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        } else {
            return false;
        }
    }

    public static function getTotalPrice($products)
    {
        if (is_array($products) && !empty($products)) {
            $sessionProducts = self::returnSessionProducts();
            if (is_array($sessionProducts) && !empty($sessionProducts)) {
                $total = 0;
                foreach ($products as $product) {
                    $total += $product['price'] * $sessionProducts[$product['id']];
                }
                return $total;
            }
        }
    }

    public static function deleteProduct($id)
    {
        if (isset($_SESSION['products'][$id])) {
            unset($_SESSION['products'][$id]);
            FunctionLibrary::redirectTo('/cart');
        }
    }

    public static function deleteProductsInCart()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
}