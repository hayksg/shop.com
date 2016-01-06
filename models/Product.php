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
            $sql  = "SELECT * ";
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

    public static function addProductToBase($options)
    {
        if (is_array($options) && !empty($options)) {
            $db = DB::getConnection();
            if ($db) {
                $sql  = "INSERT INTO product(";
                $sql .= "name,
                         category_id,
                         code,
                         price,
                         availability,
                         brand,
                         description,
                         is_new,
                         is_recommended,
                         status";
                $sql .= ") VALUES(";
                $sql .= "?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                $sql .= ")";

                $stmt = $db->prepare($sql);

                $stmt->bindParam(1,  $options['name'],           PDO::PARAM_STR);
                $stmt->bindParam(2,  $options['category_id'],    PDO::PARAM_INT);
                $stmt->bindParam(3,  $options['code'],           PDO::PARAM_INT);
                $stmt->bindParam(4,  $options['price'],          PDO::PARAM_STR);
                $stmt->bindParam(5,  $options['availability'],   PDO::PARAM_INT);
                $stmt->bindParam(6,  $options['brand'],          PDO::PARAM_STR);
                $stmt->bindParam(7,  $options['description'],    PDO::PARAM_STR);
                $stmt->bindParam(8,  $options['is_new'],         PDO::PARAM_STR);
                $stmt->bindParam(9,  $options['is_recommended'], PDO::PARAM_STR);
                $stmt->bindParam(10, $options['status'],         PDO::PARAM_STR);

                return ($stmt->execute()) ? $db->lastInsertId(): 0;
            }
        }
    }

    public static function updateProductById($id, $options)
    {
        $id = intval($id);

        if ($id) {
            if (is_array($options) && !empty($options)) {
                $db = DB::getConnection();
                if ($db) {
                    $sql  = "UPDATE product SET ";
                    $sql .= "name = :name,
                             category_id = :categoryId,
                             code = :code,
                             price = :price,
                             availability = :availability,
                             brand = :brand,
                             description = :description,
                             is_new = :isNew,
                             is_recommended = :isRecommended,
                             status = :status ";
                    $sql .= "WHERE id = :id ";
                    $sql .= "LIMIT 1";

                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name',          $options['name'],           PDO::PARAM_STR);
                    $stmt->bindParam(':categoryId',    $options['category_id'],    PDO::PARAM_INT);
                    $stmt->bindParam(':code',          $options['code'],           PDO::PARAM_INT);
                    $stmt->bindParam(':price',         $options['price'],          PDO::PARAM_STR);
                    $stmt->bindParam(':availability',  $options['availability'],   PDO::PARAM_INT);
                    $stmt->bindParam(':brand',         $options['brand'],          PDO::PARAM_STR);
                    $stmt->bindParam(':description',   $options['description'],    PDO::PARAM_STR);
                    $stmt->bindParam(':isNew',         $options['is_new'],         PDO::PARAM_STR);
                    $stmt->bindParam(':isRecommended', $options['is_recommended'], PDO::PARAM_STR);
                    $stmt->bindParam(':status',        $options['status'],         PDO::PARAM_STR);
                    $stmt->bindParam(':id',            $id,                        PDO::PARAM_INT);

                    return ($stmt->execute());
                }
            }
        }
    }

    public static function putImageToDataBase($id, $imagePath)
    {
        $db = DB::getConnection();
        if ($db) {
            $sql  = "UPDATE product SET ";
            $sql .= "image = :imagePath ";
            $sql .= "WHERE id = :id ";
            $sql .= "LIMIT 1";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':imagePath', $imagePath, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
}