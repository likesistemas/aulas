<?php

namespace Like\Exemplo\Tests\Operacoes;

use Like\Exemplo\Operacoes\Soma;
use PHPUnit\Framework\TestCase;

class SomaTest extends TestCase {

    public function testSoma() {
        $this->assertEquals(2, Soma::fazConta(1,1));
        $this->assertEquals(4, Soma::fazConta(2,2));
        $this->assertEquals(8, Soma::fazConta(4,4));
    }

}