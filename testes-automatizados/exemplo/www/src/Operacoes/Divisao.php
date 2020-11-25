<?php

namespace Like\Exemplo\Operacoes;

use LogicException;

class Divisao extends Operacao {

    public function faz() {
        if($this->numero2 == 0) {
            throw new LogicException('Nunca dividirás por zero.');
        }

        return round($this->numero1 / $this->numero2,2);
    }

}