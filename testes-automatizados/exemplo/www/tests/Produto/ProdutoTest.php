<?php

namespace Like\Exemplo\Tests\Produto;

use Like\Exemplo\Produto\Conexao;
use Like\Exemplo\Produto\Produto;
use LogicException;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase {

    public function setUp():void {
        Conexao::prepare("TRUNCATE produto;");
    }

    public function testProdutoSemPromocao() {
        $produto = new Produto("Coca-cola",5.00,0);
        $this->assertEquals("Coca-cola", $produto->getNome());
        $this->assertEquals("5.00", $produto->getValor());
        $this->assertFalse($produto->hasPromocao());
        $this->assertNull($produto->getValorPromocao());
    }

    public function testProdutoComPromocao() {
        $produto = new Produto("Batata Frita Promo Quinta",15.00,10.00);
        $this->assertEquals("Batata Frita Promo Quinta", $produto->getNome());
        $this->assertEquals("15.00", $produto->getValor());
        $this->assertTrue($produto->hasPromocao());
        $this->assertEquals("13.50", $produto->getValorPromocao());
    }

    public function testAdd() {
        $produto = new Produto('Coca-cola',5.00,0);
        $produto->add();

        $newProduto = Produto::fill($produto->getId());
        $this->assertTrue(is_int($newProduto->getId()));
        $this->assertEquals("Coca-cola", $newProduto->getNome());
        $this->assertEquals("5.00", $newProduto->getValor());
        $this->assertFalse($newProduto->hasPromocao());
        $this->assertNull($newProduto->getValorPromocao());
    }

    public function testAddComPromocao() {
        $produto = new Produto('Coca-cola','5.00','10');
        $produto->add();

        $newProduto = Produto::fill($produto->getId());
        $this->assertTrue(is_int($newProduto->getId()));
        $this->assertEquals("Coca-cola", $newProduto->getNome());
        $this->assertEquals("5.00", $newProduto->getValor());
        $this->assertTrue($newProduto->hasPromocao());
        $this->assertEquals(4.5, $newProduto->getValorPromocao());
    }

    public function testNaoExiste() {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Produto #999 não existe.");
        Produto::fill(999);
    }

}