<?php

class Conf {

    private static string $host = "localhost";
    private static string $dbname = "tdphp";
    private static string $user = "root";
    private static string $password = "";

    public static function get($field): string {
        return match ($field) {
            "host" => self::$host,
            "dbname" => self::$dbname,
            "user" => self::$user,
            "password" => self::$password,
            default => throw new \http\Exception\InvalidArgumentException("field " . $field . " doesn't exists"),
        };
    }

    public static function show_tables(): void {
        require_once 'Utils.php';

        $query = Model::getPdo() -> query("SHOW TABLES");
        $array = $query -> fetchAll(PDO::FETCH_COLUMN);

        foreach($array as $key => $value) {
            echo "<div class='row'><div class='ibox'>$key</div><div class='box'>" . Utils::firstLetterCapital($value) . "</div></div>";
        }
    }
}