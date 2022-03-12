<?php

class Trajet {

    private mixed $id;
    private mixed $start;
    private mixed $end;
    private mixed $date;
    private mixed $seats;
    private mixed $price;
    private mixed $driver_login;

    public function __construct($id = NULL, $start = NULL, $end = NULL, $date = NULL, $seats = NULL, $price = NULL, $driver_login = NULL) {
        if(!(is_null($id) || is_null($start) || is_null($end) || is_null($date) || is_null($seats) || is_null($price) || is_null($driver_login))) {
            $this -> id = $id;
            $this -> start = $start;
            $this -> end = $end;
            $this -> date = $date;
            $this -> seats = $seats;
            $this -> price = $price;
            $this -> driver_login = $driver_login;
        }
    }

    public function __toString(): string {
        return "<p>" . get_class($this) . " = [</p><p class='tab'>id = " . $this -> id . ",</p><p class='tab'>start = " . $this -> start . ",</p><p class='tab'>end = " . $this -> end . ",</p><p class='tab'>date = " . $this -> date . ",</p><p class='tab'>seats = " . $this -> seats . ",<p><p class='tab'>price = " . $this -> price . ",</p><p class='tab'>driver_login = " . $this -> driver_login . "</p>]</p>";
    }

    public function display(): void {
        echo $this;
    }

    public static function getAllTrajets(): array {
        $pdo = Model::getPdo();
        $query = $pdo -> query("SELECT * FROM trajet");
        $rises = [];

        foreach($query -> fetchAll(PDO::FETCH_OBJ) as $item) {
            $rises[] = new Trajet($item -> id, $item -> depart, $item -> arrivee, $item -> date, $item -> nbplaces, $item -> prix, $item -> conducteur_login);
        }
        return $rises;
    }
}