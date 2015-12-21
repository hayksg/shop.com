<?php

function __autoload($className)
{
    $segments = array('/components/', '/models/');
    foreach ($segments as $segment) {
        $file = ROOT . $segment . $className . '.php';
        if (is_file($file)) {
            include_once($file);
        }
    }
}