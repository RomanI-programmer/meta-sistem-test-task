<?php

namespace Meta;

/**
 * Class ArithmeticExpression
 * @package Meta\Base
 */
class ArithmeticExpression implements InterfaceArithmetic
{

    /**
     * @var array
     */
    protected $arrayCorrectSymbol = [];

    /**
     * @param array $arrayCorrectSymbol
     */
    public function setArrayCorrectSymbol(array $arrayCorrectSymbol)
    {
        $this->arrayCorrectSymbol = $arrayCorrectSymbol;
    }

    /**
     * @param $string
     * @return string
     */
    public function filterString($string): string
    {
        $newStr = '';
        for ($i = 0; $i < strlen($string); $i++) {
            foreach ($this->arrayCorrectSymbol as $key => $value) {
                if ($key == $string[$i] || $value == $string[$i]) {
                    $newStr .= $string[$i];
                }
            }
        }

        return $newStr;
    }

    /**
     * @param string $parseString
     * @return bool
     * @throws \Exception
     */
    public function checkCorrectString(string $parseString): bool
    {
        if (!$parseString) {
            throw new \Exception('Стрічка пуста!');
        }
        $str = $this->filterString($parseString);
        $tmpArray = [];
        for ($i = 0; $i < strlen($str); $i++) {
            $char = substr($str, $i, 1);
            if (!array_key_exists($char,$this->arrayCorrectSymbol)
                || end($tmpArray) !== $this->arrayCorrectSymbol[$char]) {
                $tmpArray = [];
            } else {
                $tmpArray[] = $char;
            }
        }

        if (count($tmpArray) > 0) {
            return false;
        }

        return true;
    }
}