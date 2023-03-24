<?php


class Inverter{

    private $stringToFormat;
    public function __construct(string $string)
    {
        return $this->stringToFormat = $string;
    }

    public function inverterString(): string
    {
        $stringInvertida = '';
        $tamanhoString = strlen($this->stringToFormat);
        for($i = $tamanhoString - 1; $i >= 0; $i--){
            $stringInvertida .= $this->stringToFormat[$i];
        }

        return $stringInvertida;
    }
}

$inverter = new Inverter('teste');
echo $inverter->inverterString();
