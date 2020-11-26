<?php

namespace Like\Exemplo\Produto;

use PDO;

class Conexao {

    /** @var PDO */
    static $conn;

    public static function conectarNoBd(string $host, string $user, string $password, string $name) {
        if( isset(self::$conn) ) {
            return;
        }
        
        self::$conn = new PDO(
            "mysql:host={$host};dbname={$name}",
            $user, $password
        );
    }

    public static function row(string $sql, array $params) {
        $stmt = self::$conn->prepare($sql);
        if( !$stmt->execute($params) ) {
            return null;
        }

        return $stmt->fetch();
    }

    public static function prepare($sql) {
        return self::$conn->prepare($sql);
    }

    public static function lastInsertId() {
        return self::$conn->lastInsertId();
    }
    
}