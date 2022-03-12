<?php

class Voiture {

    private mixed $imma;
    private mixed $brand;
    private mixed $color;

    public function __construct($imma = NULL, $brand = NULL, $color = NULL) {
        if(!is_null($imma) && !is_null($brand) && !is_null($color)) {
            $this -> imma = $imma;
            $this -> brand = $brand;
            $this -> color = $color;
        }
    }

    public function __toString(): string {
        return "<p>" . get_class($this) . " = [</p><p class='tab'>imma = " . $this -> imma . ",</p><p class='tab'>brand = " . ($this -> brand ?: "<em>null</em>") . ",</p><p class='tab'>color = " . ($this -> color ?: "<em>null</em>") . "</p><p>]</p>";
    }

    public function display(): void {
        echo $this;
    }

    public static function getVoitureByImma($imma) {
        $query = Model::getPdo() -> prepare("SELECT * FROM voiture WHERE immatriculation=:tag");
        $values = ["tag" => $imma];

        $query -> execute($values);
        $array = $query -> fetchAll(PDO::FETCH_OBJ);

        if(!empty($array)) {
            return $array[0];
        }
        return false;
    }

    public static function getAllVoitures(): array {
        $pdo = Model::getPdo();
        $query = $pdo -> query("SELECT * FROM voiture");
        $cars = [];

        foreach($query -> fetchAll(PDO::FETCH_OBJ) as $item) {
            $cars[] = new Voiture($item -> immatriculation, $item -> marque, $item -> couleur);
        }
        return $cars;
    }
}