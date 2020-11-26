<?php

namespace Like\Exemplo\Tests\Produto;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {

    public function testProduto() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('GET', 'produto/1');
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEqualsCanonicalizing(['id', 'nome','valor','temPromocao','valorPromocao'], array_keys($resultado));
        $this->assertEquals("Coca-cola", $resultado['nome']);
        $this->assertEquals("5", $resultado['valor']);
        $this->assertFalse($resultado['temPromocao']);
        $this->assertNull($resultado['valorPromocao']);
    }

    public function testAddSemPromocao() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('POST', 'produto', [
            'body' => json_encode([
                'nome' => 'Coca-cola',
                'valor' => '5.00',
                'percDesconto' => null
            ])
        ]);
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEqualsCanonicalizing(['id', 'nome','valor','temPromocao','valorPromocao'], array_keys($resultado));
        $this->assertEquals("Coca-cola", $resultado['nome']);
        $this->assertEquals("5", $resultado['valor']);
        $this->assertFalse($resultado['temPromocao']);
        $this->assertNull($resultado['valorPromocao']);
    }

    public function testAddComPromocao() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('POST', 'produto', [
            'body' => json_encode([
                'nome' => 'Coca-cola',
                'valor' => '5.00',
                'percDesconto' => '10.00'
            ])
        ]);
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEqualsCanonicalizing(['id', 'nome','valor','temPromocao','valorPromocao'], array_keys($resultado));
        $this->assertEquals("Coca-cola", $resultado['nome']);
        $this->assertEquals("5", $resultado['valor']);
        $this->assertTrue($resultado['temPromocao']);
        $this->assertEquals("4.5", $resultado['valorPromocao']);
    }

}