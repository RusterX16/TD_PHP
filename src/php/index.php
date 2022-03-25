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
require_once("classes/Conf.php");
require_once("classes/Voiture.php");
require_once("classes/Utilisateur.php");
require_once("classes/Trajet.php");

Conf::show_tables();
echo "<br>";

foreach(Voiture::getAllVoitures() as $v) {
    $v -> display();
}
echo "<br>";

include("form.php");

?>
</body>
</html>