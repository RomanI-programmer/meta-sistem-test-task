<?php

spl_autoload_register(
    function ($class_name) {
        include_once __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class_name . '.php';
    }
);
