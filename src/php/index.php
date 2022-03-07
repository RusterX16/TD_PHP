<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>
<?php

require_once("Conf.php");
require_once("Voiture.php");

$host = Conf ::get("host");
$dbname = Conf ::get("dbname");
$user = Conf ::get("user");
$password = Conf ::get("password");

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch(PDOException $e) {
    die($e -> getMessage());
}

$query = $pdo -> query("SELECT * FROM Voiture");
$array = $query -> fetchAll(PDO::FETCH_OBJ);

foreach($array as $key => $value) {
    Voiture ::$cars[] = new Voiture($value -> immatriculation, $value -> marque, $value -> couleur);
}

foreach(Voiture::$cars as $key => $value) {
    $value -> display();
}

?>
</body>
</html>