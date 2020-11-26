<?php

namespace Like\Exemplo\Tests\Operacoes;

use Like\Exemplo\Operacoes\Divisao;
use LogicException;
use PHPUnit\Framework\TestCase;

class DivisaoTest extends TestCase {

    public function testDivisao() {
        $this->assertEquals(2, Divisao::fazConta(4,2));
        $this->assertEquals(4, Divisao::fazConta(8,2));
        $this->assertEquals(5, Divisao::fazConta(10,2));
    }

    public function testDivisaoDecimal() {
        $this->assertEquals(2.5, Divisao::fazConta(5,2));
        $this->assertEquals(3.33, Divisao::fazConta(10,3));
        $this->assertEquals(4.5, Divisao::fazConta(9,2));
    }

    public function testDivisaoNegativo() {
        $this->assertEquals(-2.5, Divisao::fazConta(5,-2));
        $this->assertEquals(-3.33, Divisao::fazConta(10,-3));
        $this->assertEquals(-4.5, Divisao::fazConta(9,-2));
    }

    public function testDivisaoZero() {
        $this->assertEquals(0, Divisao::fazConta(0,2));
        $this->assertEquals(0, Divisao::fazConta(0,-2));
    }

    public function testDivisaoPorZero() {
        $this->expectException(LogicException::class);
        $this->expectErrorMessage("Nunca dividirás por zero.");
        Divisao::fazConta(5,0);
    }

}