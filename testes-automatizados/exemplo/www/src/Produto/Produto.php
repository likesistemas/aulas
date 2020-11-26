<?php

namespace Like\Exemplo\Produto;

use LogicException;

class Produto {

    /** @var int */
    private $id;

    /** @var string */
    private $nome;

    /** @var float */
    private $valor;

    /** @var float */
    private $percDesconto;

    public function __construct(string $nome, float $valor, float $percDesconto) {
        $this->id = null;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->percDesconto = $percDesconto;
    }

    private function setId(int $id) {
        $this->id = $id;
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

    public function toArray() {
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'valor' => $this->getValor(),
            'temPromocao' => $this->hasPromocao(),
            'valorPromocao' => $this->getValorPromocao()
        ];
    }

    public function toJson() {
        return json_encode($this->toArray());
    }

    public function getValorPromocao():?float {
        if(!$this->hasPromocao()) {
            return null;
        }

        return $this->valor - ($this->valor * ($this->percDesconto/100));
    }

    public static function fill(int $id) {
        $sql = "SELECT id, nome, valor, percDesconto 
                FROM produto 
                WHERE id = ?";
        $row = Conexao::row($sql, [$id]);

        if(!$row) {
            throw new LogicException("Produto #{$id} não existe.");
        }

        $produto = new Produto(
            $row['nome'],
            $row['valor'],
            $row['percDesconto']
        );
        $produto->setId($row['id']);
        return $produto;
    }

    public function add() {
        $sql = "INSERT INTO `produto` (nome, valor, percDesconto) VALUES (:nome,:valor,:percDesconto);";
        $stmt = Conexao::prepare($sql);
        $stmt->execute([
            'nome' => $this->nome,
            'valor' => $this->valor,
            'percDesconto' => $this->percDesconto ?? 0
        ]);
        $this->id = Conexao::lastInsertId();
        return $this;
    } 

}
