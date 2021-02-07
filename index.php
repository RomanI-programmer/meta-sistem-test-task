<?php

use Meta\ArithmeticExpression;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

$object = new ArithmeticExpression();

$object->setArrayCorrectSymbol(
    [
        '[' => ']',
        '{' => '}',
        '(' => ')',
    ]
);

try {
    if ($object->checkCorrectString('(sdsfd{vdfvdf)}')) {
        echo 'Вірно';
    } else {
        echo 'Не вірно';
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
