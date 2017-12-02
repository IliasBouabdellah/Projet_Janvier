<h2 id="titre">Bienvenue chez Sois</h2>
<?php
$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("accueil");
//var_dump($texte);
?>

