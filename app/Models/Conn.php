<?php

namespace Modelos;

use PDO;

class Conn {

    private static $pdo;

    private function __construct() {
        
    }

    public static function getConectar() {

        if (!isset(self::$pdo)) {
            $servidor = "localhost";
            $banco = "efcol";
            $usuario = "root";
            $senha = "18212812";

            try {

                self::$pdo = new PDO("mysql:dbname=" . $banco . ";host=" . $servidor, $usuario, $senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->query("SET NAMES 'utf8'");
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        return self::$pdo;
    }

}
