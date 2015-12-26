<?php

class FunctionLibrary
{
    public static function clearStr($value)
    {
        return trim(strip_tags($value));
    }

    public static function clearInt($value)
    {
        return abs((int)$value);
    }

    public static function redirectTo($location = false)
    {
        if ($location) {
            header("Location: $location");
            exit;
        }
    }

    public static function buildPagination($page, $total, $count, $index)
    {
        if ($total > $count) {
            if ($page > 0 && $page <= ceil($total / $count)) {
                $pagination = new Pagination($total, $page, $count, $index);
                return $pagination;
            }else {
                FunctionLibrary::redirectTo('/');
            }
        }
    }

    public static function passwordEncrypt($password){
        $hash_format = '$2y$10$';
        $salt_length = 22;
        $salt = self::generateSalt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($password, $format_and_salt);
        return $hash;
    }

    public static function generateSalt($length){
        $unique_random_string = md5(uniqid(mt_rand(), true));
        $base64_string = base64_encode($unique_random_string);
        $modified_base64_string = str_replace('+', '.', $base64_string);
        $salt = substr($modified_base64_string, 0, $length);
        return $salt;
    }

    public static function passwordCheck($password, $existing_hash){
        $hash = crypt($password, $existing_hash);
        if($hash === $existing_hash){
            return true;
        } else{
            return false;
        }
    }

    public static function encrypted($string, $key)
    {
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );

        $encrypted = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                $string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );

        return $encrypted;
    }

    public static function decrypted($encrypted, $key)
    {
        $data = base64_decode($encrypted);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );

        return $decrypted;
    }

    public static function sessionMessage()
    {
        if (isset($_SESSION['message'])) {
            $message = htmlentities($_SESSION['message']);
            unset($_SESSION['message']);
            return $message;
        } else {
            return false;
        }
    }
}