<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>
<?php
require_once("classes/Model.php");
require_once("classes/Voiture.php");
require_once("classes/Utilisateur.php");
require_once("classes/Trajet.php");

/*foreach(Voiture::getAllVoitures() as $key => $value) {
    $value -> display();
}

foreach(Utilisateur::getAllUtilisateurs() as $key => $value) {
    $value -> display();
}

foreach(Trajet::getAllTrajets() as $key => $value) {
    $value -> display();
}*/

echo Voiture::getVoitureByImma("AA000AA");

$v = new Voiture('AA999AA', 'Skoda', 'Vert');
$v -> save();

?>
</body>
</html>