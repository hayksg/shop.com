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
        $categories = Category::getCategoryList(false);
        if (!$categories) {$categories = array();}

        if (isset($_POST['submit'])) {
            $options['name']           = FunctionLibrary::clearStr($_POST['name']);
            $options['code']           = FunctionLibrary::clearStr($_POST['code']);
            $options['price']          = FunctionLibrary::clearStr($_POST['price']);
            $options['brand']          = FunctionLibrary::clearStr($_POST['brand']);
            $options['category_id']    = FunctionLibrary::clearStr($_POST['category_id']);
            $options['availability']   = FunctionLibrary::clearStr($_POST['availability']);
            $options['is_new']         = FunctionLibrary::clearStr($_POST['is_new']);
            $options['is_recommended'] = FunctionLibrary::clearStr($_POST['is_recommended']);
            $options['status']         = FunctionLibrary::clearStr($_POST['status']);
            $options['description']    = FunctionLibrary::clearStr($_POST['description']);

            $errors = array();

            if (!User::checkName($options['name'])) {
                $errors[] = 'Название товара должно быть больше 1 символа.';
            }

            if (empty($errors)) {
                $id = Product::addProductToBase($options);
                if ($id) {
                    $tmpName = $_FILES['image']['tmp_name'];

                    if (is_uploaded_file($tmpName)) {
                        $destination = "/images/home/product{$id}.jpg";
                        $result = Product::putImageToDataBase($id, $destination);

                        if ($result) {
                            $imagesFolder = $_SERVER['DOCUMENT_ROOT'] . "/template" . $destination;
                            move_uploaded_file($tmpName,  $imagesFolder);
                        }
                    }
                    FunctionLibrary::redirectTo('admin/product');
                }
            }
        }

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $categories = Category::getCategoryList(false);
        if (!$categories) {$categories = array();}

        $product = Product::getProductById($id, false);
        if (!$product) {$product = array();}

        if (isset($_POST['submit'])) {
            $options['name']           = FunctionLibrary::clearStr($_POST['name']);
            $options['code']           = FunctionLibrary::clearStr($_POST['code']);
            $options['price']          = FunctionLibrary::clearStr($_POST['price']);
            $options['brand']          = FunctionLibrary::clearStr($_POST['brand']);
            $options['category_id']    = FunctionLibrary::clearStr($_POST['category_id']);
            $options['availability']   = FunctionLibrary::clearStr($_POST['availability']);
            $options['is_new']         = FunctionLibrary::clearStr($_POST['is_new']);
            $options['is_recommended'] = FunctionLibrary::clearStr($_POST['is_recommended']);
            $options['status']         = FunctionLibrary::clearStr($_POST['status']);
            $options['description']    = FunctionLibrary::clearStr($_POST['description']);

            $errors = array();

            if (!User::checkName($options['name'])) {
                $errors[] = 'Название товара должно быть больше 1 символа.';
            }

            if (empty($errors)) {
                if ($id) {
                    $result = Product::updateProductById($id, $options);

                    if (!$result) {
                        $message = 'Произошла ошибка при редактировании.';
                    } else {
                        if (!empty($_FILES['image']['tmp_name'])) {
                            $tmpName = $_FILES['image']['tmp_name'];
                            if (is_uploaded_file($tmpName)) {
                                /*
                                   Следующие две строки для того
                                   чтобы иметь возможность поменять
                                   картинку no-image в базе
                                   (а не то меняется только картинка в папке)
                                */
                                $imagePath = "/images/home/product{$id}.jpg";
                                $result = Product::putImageToDataBase($id, $imagePath);

                                if ($result) {
                                    $destination = $_SERVER['DOCUMENT_ROOT'] . "/template" . $imagePath;
                                    move_uploaded_file($tmpName, $destination);
                                }
                            }
                        }

                        FunctionLibrary::redirectTo('admin/product');
                    }
                }
            }
        }

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