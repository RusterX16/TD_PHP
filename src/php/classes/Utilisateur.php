<?php

class Utilisateur {

    private mixed $login;
    private mixed $nom;
    private mixed $prenom;

    public function __construct($login = NULL, $nom = NULL, $prenom = NULL) {
        if(!is_null($login) && !is_null($nom) && !is_null($prenom)) {
            $this -> login = $login;
            $this -> nom = $nom;
            $this -> prenom = $prenom;
        }
    }

    public function __toString(): string {
        return "<p>" . get_class($this) . " = [</p><p class='tab'>login = " . $this -> login . ",</p><p class='tab'>nom = " . ($this -> nom ?: "<em>null</em>") . ",</p><p class='tab'>prenom = " . ($this -> prenom ?: "<em>null</em>") . "</p><p>]</p>";
    }

    public function display(): void {
        echo $this;
    }

    public static function getAllUtilisateurs(): array {
        $pdo = Model::getPdo();
        $query = $pdo -> query("SELECT * FROM utilisateur");
        $users = [];

        foreach($query -> fetchAll(PDO::FETCH_OBJ) as $item) {
            $users[] = new Utilisateur($item -> login, $item -> nom, $item -> prenom);
        }
        return $users;
    }
}