<?php

class Model {

    private static $pdo;

    private static function connect(): void {
        require_once("Conf.php");
        require_once("Voiture.php");

        $host = Conf::get("host");
        $dbname = Conf::get("dbname");
        $user = Conf::get("user");
        $password = Conf::get("password");

        try {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        } catch(PDOException $e) {
            die($e -> getMessage());
        }
    }

    public static function getPdo(): PDO {
        if(is_null(self::$pdo)) {
            self::connect();
        }
        return self::$pdo;
    }
}