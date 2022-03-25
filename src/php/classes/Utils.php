<?php

class Utils {

    public static function firstLetterCapital($string): string {
        return strtoupper(substr($string, 0, 1)) . strtolower(substr($string, 1, strlen($string)));
    }
}