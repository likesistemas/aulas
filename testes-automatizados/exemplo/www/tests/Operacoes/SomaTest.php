<?php

namespace Like\Exemplo\Tests\Operacoes;

use Like\Exemplo\Operacoes\Soma;
use PHPUnit\Framework\TestCase;

class SomaTest extends TestCase {

    public function testSoma() {
        $this->assertEquals(2, Soma::fazConta(1,1));
        $this->assertEquals(0, Soma::fazConta(2,-2));
        $this->assertEquals(8.55, Soma::fazConta(3.333,5.22));
        $this->assertEquals(8.56, Soma::fazConta(3.337,5.22));
    }

}