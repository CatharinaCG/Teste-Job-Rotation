<?php


class Financ
{
    private function mediaMensal($faturamentoDiario)
    {
        $somaValoresDiarios = 0;
        $contadorDiasUteis = 0;
        foreach ($faturamentoDiario as $dia) {
            // verifica se o dia é útil (não é final de semana ou feriado)
            if (date('N', strtotime("2023-03-{$dia['dia']}")) <= 5) {
                $somaValoresDiarios += $dia['valor'];
                $contadorDiasUteis++;
            }
        }

        return $somaValoresDiarios / $contadorDiasUteis;
    }

    public function faturamento()
    {
         $data = file_get_contents('faturamento.json');
         $faturamentoDiario = json_decode($data, true);


        $menorValor = null;
        $maiorValor = null;

        $contador_valores_diarios = 0;


        foreach ($faturamentoDiario as $dia) {
            if ($maiorValor === null || $dia['valor'] > $maiorValor) {
                $maiorValor = $dia['valor'];
            }

            if ($menorValor === null || $dia['valor'] < $menorValor) {
                $menorValor = $dia['valor'];
            }

            if ($dia['valor'] > $this->mediaMensal($faturamentoDiario)) {
                $contador_valores_diarios++;
            }
        }

        return [
            'Menor valor de faturamento: R$ ' => $menorValor,
            'Maior valor de faturamento: R$ ' => $maiorValor,
            'Número de dias com valor de faturamento diário superior à média mensal: ' => $contador_valores_diarios
        ];
    }
}

$financ = new Financ();
$response = $financ->faturamento();

foreach ($response as $key => $value) {
    echo $key . $value . PHP_EOL;
}
