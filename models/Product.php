<?php

class Product
{
    const SHOW_BY_DEFAULT = 9;

    public static function getProductsList($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        if ($count) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT id, name, price, image, is_new ";
                $sql .= "FROM product ";
                $sql .= "WHERE status = 1 ";
                $sql .= "ORDER BY id DESC ";
                $sql .= "LIMIT :count";

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

    public static function getProductsByCategoryId($id)
    {
        $id = intval($id);
        if ($id) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "SELECT id, name, price, image, is_new ";
                $sql .= "FROM product ";
                $sql .= "WHERE status = 1 ";
                $sql .= "AND category_id = :id ";
                $sql .= "ORDER BY id DESC ";
                $sql .= "LIMIT " . self::SHOW_BY_DEFAULT;

                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                $products = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $products[] = $row;
                }
                return $products;
            }
        }
    }
}