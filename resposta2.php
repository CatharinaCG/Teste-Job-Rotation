<?php


class Calc
{
    public function verificaFibonacci(int $num): string
    {
        $a = 0;
        $b = 1;
        $fibonacci = array(0, 1);

        while ($b <= $num) { // Loop enquanto o próximo valor da sequência não ultrapassar o número informado
            $prox = $a + $b;
            $a = $b;
            $b = $prox;
            $fibonacci[] = $b;
        }

        if (in_array($num, $fibonacci)) {
            return "$num pertence à sequência de Fibonacci";
        } else {
            return "$num não pertence à sequência de Fibonacci";
        }
    }
}

// Exemplo de uso da f
$calc = new Calc();
echo $calc->verificaFibonacci(13);
