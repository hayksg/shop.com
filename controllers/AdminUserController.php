<?php

class AdminUserController extends AdminBase
{
    public function actionIndex()
    {
        $admins = User::getAllAdmins();

        $message = FunctionLibrary::sessionMessage();

        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }

    public function actionCreate()
    {
        $name     = '';
        $email    = '';
        $password = '';
        $result   = '';

        if (isset($_POST['submit'])) {
            $name     = FunctionLibrary::clearStr($_POST['name']);
            $email    = FunctionLibrary::clearStr($_POST['email']);
            $password = FunctionLibrary::clearStr($_POST['password']);

            $errors = array();

            if (!User::checkName($name)) {
                $errors[] = 'Имя должно быть больше 1 символа.';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Невалидный Email.';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой еmail уже существует.';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть больше 5 символов.';
            }

            if (empty($errors)) {
                $result = User::registerUser($name, $email, $password);

                if (!$result) {
                    $message = 'Произошла ошибка при создании админа.';
                } else {
                    FunctionLibrary::redirectTo('/admin/user');
                }
            }
        }

        require_once(ROOT . '/views/admin_user/create.php');
        return true;
    }

    public function actionDelete($id)
    {
        $result = User::deleteAdmin($id);

        if (!$result) {
            $_SESSION['message'] = 'Произошла ошибка при удалении.';
        }
        FunctionLibrary::redirectTo('admin/user');
        return true;
    }
}