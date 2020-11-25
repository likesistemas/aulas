<?php

namespace Like\Exemplo\Operacoes;

abstract class Operacao {

    /** @var int */
    protected $numero1;

    /** @var int */
    protected $numero2;

    public function __construct($numero1, $numero2) {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }

    public abstract function faz();

    public static function fazConta($numero1, $numero2) {
        $o = new static($numero1, $numero2);
        return $o->faz();
    }

}