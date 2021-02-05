<?php

namespace Meta\Base;

/**
 * Class ArithmeticExpression
 * @package Meta\Base
 */
class ArithmeticExpression
{

    /**
     * @var array
     */
    protected $arrayCorrectSymbol = [];

    /**
     * @var string
     */
    protected $stringParse;

    /**
     * @return string
     */
    public function getStringParse(): string
    {
        return $this->stringParse;
    }

    /**
     * @param mixed $stringParse
     * @return ArithmeticExpression
     * @throws \Exception
     */
    public function setStringParse($stringParse): self
    {
        if (!is_string($stringParse)){
            throw new \Exception('В параметр потрібно передати стрічку');
        }
        elseif ($stringParse == ""){
            throw new \Exception('Вхідна стрічка пуста!');
        }
        $this->stringParse = $this->filterString($stringParse);

        return $this;
    }

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
            if (in_array($string[$i],$this->arrayCorrectSymbol)){
                $newStr.= $string[$i];
            }
        }
        return $newStr;
    }

    /**
     * @return bool
     */
    public function checkCorrectString(): bool
    {
        $count = 0;
        for ($i = 0; $i < strlen($this->stringParse); $i++) {
            if(in_array($this->stringParse[$i],$this->arrayCorrectSymbol)){
                $count++;
            }
        }
        if ($count % 2 == 0) {
            return true;
        }

        return false;
    }
}