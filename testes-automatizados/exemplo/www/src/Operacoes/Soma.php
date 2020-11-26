<?php

namespace Like\Exemplo\Operacoes;

class Soma extends Operacao {

    public function faz() {
        return round($this->numero1 + $this->numero2,2);
    }

}
