<?php

namespace Like\Exemplo\Tests\Produto;

use Like\Exemplo\Produto\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase {

    public function testProdutoSemPromocao() {
        $produto = new Produto(1);

        $this->assertEquals("Coca-cola", $produto->getNome());
        $this->assertEquals("5.00", $produto->getValor());
        $this->assertFalse($produto->hasPromocao());
        $this->assertNull($produto->getValorPromocao());
    }

    public function testProdutoComPromocao() {
        $produto = new Produto(3);

        $this->assertEquals("Batata Frita Promo Quinta", $produto->getNome());
        $this->assertEquals("15.00", $produto->getValor());
        $this->assertTrue($produto->hasPromocao());
        $this->assertEquals("13.50", $produto->getValorPromocao());
    }

}