<?php

namespace Like\Exemplo\Tests\Produto;

use Like\Exemplo\Produto\Produto;
use LogicException;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase {

    public function testProdutoSemPromocao() {
        $produto = new Produto(1);

        $this->assertEquals(1, $produto->getId());
        $this->assertEquals("Coca-cola", $produto->getNome());
        $this->assertEquals("5.00", $produto->getValor());
        $this->assertFalse($produto->hasPromocao());
        $this->assertNull($produto->getValorPromocao());
    }

    public function testProdutoComPromocao() {
        $produto = new Produto(3);

        $this->assertEquals(3, $produto->getId());
        $this->assertEquals("Batata Frita Promo Quinta", $produto->getNome());
        $this->assertEquals("15.00", $produto->getValor());
        $this->assertTrue($produto->hasPromocao());
        $this->assertEquals("13.50", $produto->getValorPromocao());
    }

    public function testAdd() {
        $produto = Produto::add('Coca-cola','5.00',null);

        $this->assertTrue(is_int($produto->getId()));
        $this->assertEquals("Coca-cola", $produto->getNome());
        $this->assertEquals("5.00", $produto->getValor());
        $this->assertFalse($produto->hasPromocao());
        $this->assertNull($produto->getValorPromocao());
    }

    public function testAddComPromocao() {
        $produto = Produto::add('Coca-cola','5.00','10');

        $this->assertTrue(is_int($produto->getId()));
        $this->assertEquals("Coca-cola", $produto->getNome());
        $this->assertEquals("5.00", $produto->getValor());
        $this->assertTrue($produto->hasPromocao());
        $this->assertEquals(4.5, $produto->getValorPromocao());
    }

    public function testNaoExiste() {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Produto #999 não existe.");
        new Produto(999);
    }

}