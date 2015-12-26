<?php

class Product
{
    const SHOW_BY_DEFAULT = 9;

    public static function getProductsList($count = self::SHOW_BY_DEFAULT, $page)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page - 1) * $count;
        if ($count) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT id, name, price, image, is_new ";
                $sql .= "FROM product ";
                $sql .= "WHERE status = 1 ";
                $sql .= "ORDER BY id DESC ";
                $sql .= "LIMIT :count";
                if ($offset > 0) {
                    $sql .= " OFFSET " . $offset;
                }

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':count', $count, PDO::PARAM_INT);
                $stmt->execute();

                $products = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $products[] = $row;
                }
                return $products;
            }
        }
    }

    public static function getAllProducts()
    {
        $db = DB::getConnection();
        if ($db) {
            $sql  = "SELECT id, name, price, image, code ";
            $sql .= "FROM product ";
            $sql .= "ORDER BY id ASC";

            if (!$result = $db->query($sql)) {
                return false;
            }

            $products = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $products[] = $row;
            }
            return $products;
        }
    }

    public static function getProductsByCategoryId($categoryId, $page)
    {
        $categoryId = intval($categoryId);
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        if ($categoryId) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT id, name, price, image, is_new ";
                $sql .= "FROM product ";
                $sql .= "WHERE status = 1 ";
                $sql .= "AND category_id = :categoryId ";
                $sql .= "ORDER BY id DESC ";
                $sql .= "LIMIT " . self::SHOW_BY_DEFAULT;
                $sql .= " OFFSET " . $offset;

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
                $stmt->execute();

                $products = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $products[] = $row;
                }
                return $products;
            }
        }
    }

    public static function getProductById($id, $status = true)
    {
        $id = intval($id);
        if ($id) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT * ";
                $sql .= "FROM product ";
                $sql .= "WHERE id = :id ";
                if ($status) {
                    $sql .= "AND status = 1 ";
                }
                $sql .= "LIMIT 1";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                $product = array();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                return $product;
            }
        }
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $categoryId = intval($categoryId);
        if ($categoryId) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT COUNT(id) ";
                $sql .= "AS count ";
                $sql .= "FROM product ";
                $sql .= "WHERE status = 1 ";
                $sql .= "AND category_id = :categoryId ";
                $sql .= "LIMIT 1";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['count'];
            }
        }
    }

    public static function getTotalProducts()
    {
        $db = DB::getConnection();
        if ($db) {
            $sql  = "SELECT COUNT(id) ";
            $sql .= "AS count ";
            $sql .= "FROM product ";
            $sql .= "WHERE status = 1 ";
            $sql .= "LIMIT 1";

            if (!$result = $db->query($sql)) {
                return false;
            }

            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        }
    }

    public static function getProductsInCart($idsArray)
    {
        if (is_array($idsArray) && !empty($idsArray)) {
            $idsString = implode(',', $idsArray);

            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT id, name, price, code ";
                $sql .= "FROM product ";
                $sql .= "WHERE id ";
                $sql .= "IN($idsString) ";
                $sql .= "ORDER BY id ASC";

                if (!$result = $db->query($sql)) {
                    return false;
                }

                $products = array();
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $products[] = $row;
                }
                return $products;
            }
        }
    }

    public static function getRecomemdedProducts()
    {
        $db = DB::getConnection();
        if ($db) {
            $sql  = "SELECT id, name, price, image, is_new ";
            $sql .= "FROM product ";
            $sql .= "WHERE status = 1 ";
            $sql .= "AND is_recommended = 1 ";
            $sql .= "ORDER BY id DESC";

            if (!$result = $db->query($sql)) {
                return false;
            }

            $products = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $products[] = $row;
            }
            return $products;
        }
    }

    public static function deleteProduct($id)
    {
        $id = intval($id);
        if ($id) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "DELETE FROM product ";
                $sql .= "WHERE id = :id ";
                $sql .= "LIMIT 1";

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                return $stmt->execute();
            }
        }
    }
}