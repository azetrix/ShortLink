<?php

spl_autoload_register(
    function ($class_name) {
        $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
        $file = __DIR__ . DIRECTORY_SEPARATOR . $class_name.".php";
        if (is_readable($file)) {
            require_once $file;
        } else {
            //echo "Undefined Class: \"$class_name\".";
            throw new \Exception("Undefined Class: \"$class_name\".");
        }
    }
);