<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $products = Product::getProductsList(6, 0);
        if (!$products) {$products = array();}

        $recomendedProducts = Product::getRecomemdedProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionContact()
    {
        $categories = Category::getCategoryList();
        if (!$categories) {$categories = array();}

        $email   = '';
        $subject = '';
        $message = '';
        $result  = '';

        if (isset($_POST['submit'])) {
            $email   = FunctionLibrary::clearStr($_POST['email']);
            $subject = FunctionLibrary::clearStr($_POST['subject']);
            $message = FunctionLibrary::clearStr($_POST['message']);

            $errors = array();

            if (!User::checkEmail($email)) {
                $errors[] = 'Невалидный Email.';
            }

            if (!User::checkName($subject)) {
                $errors[] = 'Тема должна быть больше 1 символа.';
            }

            if (!User::checkName($message)) {
                $errors[] = 'Сообщение должно быть больше 1 символа.';
            }

            if (empty($errors)) {
                $adminEmail = 'testxamppphp@gmail.com';
                $sub = "Тема письма: {$subject}. От: {$email}";
                $mess = "Текст письма: {$message}";
                $result = mail($adminEmail, $sub, $mess);
            }
        }

        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
}