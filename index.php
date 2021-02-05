<?php

use Meta\Base\ArithmeticExpression;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

$object = new ArithmeticExpression();
$object->setArrayCorrectSymbol(['[',']','{','}','(',')']);
try {
    $object->setStringParse("dfkm{akdm]ajdn}akdm](");
} catch (Exception $e) {
    echo "Виникла помилка {$e->getMessage()}";
    exit();
}

if($object->checkCorrectString()) {
    echo 'Вірно';
}
else{
    echo 'Не вірно';
}
