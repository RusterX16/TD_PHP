<?php

class Conf {

    private static $host = "localhost";
    private static $dbname = "tdphp";
    private static $user = "root";
    private static $password = "";

    public static function get($field) {
        return match ($field) {
            "host" => self ::$host,
            "dbname" => self ::$dbname,
            "user" => self ::$user,
            "password" => self ::$password,
            default => throw new \http\Exception\InvalidArgumentException("field " . $field . " doesn't exists"),
        };
    }
}