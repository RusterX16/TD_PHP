<?php

class Voiture {

    public static array $cars = [];

    private $imma;
    private $brand;
    private $color;

    public function __construct($imma = NULL, $brand = NULL, $color = NULL) {
        if(!is_null($imma) && !is_null($brand) && !is_null($color)) {
            $this -> $imma = $imma;
            $this -> $brand = $brand;
            $this -> $color = $color;
        }
    }

    public function display() {
        echo $this;
    }

    public function __toString(): string {
        return $this -> $imma . ", " . ($this -> $brand ?: "null") . ", " . ($this -> $color ?: "null");
    }
}