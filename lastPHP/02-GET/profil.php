<?php
//Exercice :
/**
 * 1-   vous créez une page "profil" avec un nom et un prenom
 * 2-Vous y ajoutez 1 lien "modifier mon profil". Ce lien passe dans l'url à la page exercice.php elle-même que l'action demandée est la modification du compte
 * 3-Si la modification est demabdée, c'est à dire que vous avez recus cette info en GET, Vous affichez "vous avez demandée la modification de votre profil"
 */
// Traitement PHP :
$message = '';

echo'<pre>';
print_r($_GET);
echo'</pre>';
if (isset($_GET['modif']) && $_GET['modif'] == 'prenom' ) {
    $message= '<p> vous avez demandé la modification de votre profil </p>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Mon profil</h1>
    <?php
        echo $message;
    ?>
    <p>Kim Sinvry </p>
    <br>
    <a href="profil.php?modif=prenom">Modifier mon profil</a>
</body>




