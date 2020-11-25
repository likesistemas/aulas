<?php

namespace Like\Exemplo;

use PDO;

class Produto {

    /** @var PDO */
    private $conn;

    /** @var int */
    private $id;

    /** @var string */
    private $nome;

    /** @var float */
    private $valor;

    /** @var float */
    private $percDesconto;

    public function __construct(int $id) {
        $this->connectarNoBd('mysql', 'root', 'root', 'meu-db');
        $sql = "SELECT id, nome, valor, percDesconto FROM produto WHERE id = ?";
        $row = $this->row($sql, [$id]);

        $this->id = $id;
        $this->nome = $row['nome'];
        $this->valor = $row['valor'];
        $this->percDesconto = $row['percDesconto'];
    }

    public function connectarNoBd(string $host, string $user, string $password, string $name) {
        $this->conn = new PDO("mysql:host={$host};dbname={$name}", $user, $password);
    }

    public function row(string $sql, array $params) {
        $stmt = $this->conn->prepare($sql);
        if( !$stmt->execute($params) ) {
            return null;
        }

        return $stmt->fetch();
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function hasPromocao() {
        return $this->percDesconto > 0;
    }

    public function getValorPromocao() {
        return $this->valor - ($this->valor * (100/ $this->percDesconto));
    }

}
