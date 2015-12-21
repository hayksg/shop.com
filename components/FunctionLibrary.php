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
}