<?php

namespace Like\Exemplo\Produto;

use LogicException;
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
        $this->conn = self::conectarNoBd('mysql', 'root', 'root', 'meu-db');
        $sql = "SELECT id, nome, valor, percDesconto FROM produto WHERE id = ?";
        $row = $this->row($sql, [$id]);

        if(!$row) {
            throw new LogicException("Produto #{$id} não existe.");
        }

        $this->id = $id;
        $this->nome = $row['nome'];
        $this->valor = $row['valor'];
        $this->percDesconto = $row['percDesconto'];
    }

    public static function conectarNoBd(string $host, string $user, string $password, string $name) {
        return new PDO("mysql:host={$host};dbname={$name}", $user, $password);
    }

    public function row(string $sql, array $params) {
        $stmt = $this->conn->prepare($sql);
        if( !$stmt->execute($params) ) {
            return null;
        }

        return $stmt->fetch();
    }

    public function getId():int {
        return $this->id;
    }

    public function getNome():string {
        return $this->nome;
    }

    public function getValor():float {
        return $this->valor;
    }

    public function hasPromocao():bool {
        return $this->percDesconto > 0;
    }

    public function getValorPromocao():?float {
        if(!$this->hasPromocao()) {
            return null;
        }

        return $this->valor - ($this->valor * ($this->percDesconto/100));
    }

    public static function add(string $nome, float $valor, float $percDesconto) {
        $conn = self::conectarNoBd('mysql', 'root', 'root', 'meu-db');
        $sql = "INSERT INTO `produto` (nome, valor, percDesconto) VALUES (:nome,:valor,:percDesconto);";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'valor' => $valor,
            'percDesconto' => $percDesconto
        ]);
        $id = $conn->lastInsertId();
        return new Produto($id);
    } 

}
