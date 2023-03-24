<?php

class Media
{

    private $mockMedia = [
        'SP' => 67836.43,
        'RJ' => 36678.66,
        'MG' => 29229.88,
        'ES' => 27165.48,
        'Outros' => 19849.53
    ];

    public function mensal()
    {
        $responses = [];

        $faturamentoMensal = $this->mockMedia;
        $total_faturamento_mensal = array_sum($faturamentoMensal);

        $percentual_representacao = [];

        foreach ($faturamentoMensal as $estado => $faturamento) {
            $percentual = $faturamento / $total_faturamento_mensal * 100;
            $percentual_representacao[$estado] = $percentual;
        }

        foreach ($percentual_representacao as $estado => $percentual) {
            $responses[] = [
                'estado' => $estado,
                'percentual' => number_format($percentual, 2, ',', '.')
            ];
        }

        return $responses;
    }
}


$mediaClass = new Media();
$medias = $mediaClass->mensal();

foreach ($medias as $media) {
    echo "{$media['estado']} representou {$media['percentual']}% do faturamento mensal da distribuidora" . PHP_EOL;
}
