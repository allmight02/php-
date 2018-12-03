<?php
// -----------------------
#La superglobale $_POST
// -----------------------

// $_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.
// $_POST est une superglobale donc un array.Il est disponible dans tous les contexte du script y compris au sein des fonctions.

// Syntaxe de $_POST : $_POST = array ('name1' => 'valeur input1','nameN' => 'valeur inputN').

print_r($_POST);
echo '<hr>';

if (!empty($_POST)) {# SI $_POST n'est pas vide c'est qu' on a recu des données du formulaire (le formulaire à été soumis)
    echo 'Prénom :' . $_POST['prenom'] . '<br>';
    echo 'Descritpion :' . $_POST['description'] . '<br>'; // les indices "prenom" et "description" proviennent des names du formulaire HTML.
}

// Pour réinitialiser un formulaire avec le dernier code saisi : on clique dans l'url + "entrée"
// Pour répéter la dernière action et donc renvoyer les données du formulaire :

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>formulaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
    <script src="main.js"></script>
</head>
<body>
<h1>Formulaire</h1>
<!--Un formulaire doit toujours être dans des balise <form> pour fonctionnner.Attribut method définit la méthode d'envoi des saisies vers le serveur . Attribut action définit l'url de destination des saisies-->
<form method="post" action=""> 
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom">
    <!--les name des inputs constituent les indices de l'array $_POST qui receptionne les infos-->
    <br>
<br>
    <label for="description">Description</label>
    <textarea name="description"id="description" cols="30" row="10"></textarea> <!-- les id et les for sont liés : il permettent de placer le curseur dans l'input qaudn on clique sur le label-->
    <br>
    <input type="submit" value="envoyer">




</form>    



</body>
</html>