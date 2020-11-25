<?php

namespace Like\Exemplo\Tests\Operacoes;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {

    public function testSoma() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('GET', 'soma/2/2');
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEquals(4, $resultado['resultado']); 
    }

    public function testDivisao() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('GET', 'divisao/6/2');
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEquals(3, $resultado['resultado']); 
    }

    public function testDivisaoPorZero() {
        $client = new Client(['base_uri' => 'http:/nginx/']);
        $response = $client->request('GET', 'divisao/6/0');
        $resultado = json_decode($response->getBody()->getContents(), true);
        $this->assertTrue(is_array($resultado));
        $this->assertEquals("Nunca dividirás por zero.", $resultado['erro']); 
    }

}