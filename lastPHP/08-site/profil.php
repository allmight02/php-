<?php

require_once 'inc/init.inc.php';


// 2- Traitement---------------------------------------------
// Si membre NON connecté alors on le redirige vers la page connexion il n'a pas le droit s'acceder  à son profil
if (!internauteEstConnecte()) {
    header('location:connexion.php');
    exit();
}
// 1- Préparation des variables d'affichages :--
extract($_SESSION['membre']); //extrait tous les indices pour en faire des variables qui la recoit la valeur qui leur correspondent

// 





// -----------------AFFICHAGE ---------

require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Profil</h1>
<h2>Bonjour <strong><?php  echo  $prenom;  ?></strong></h2>
<?php 
if (internauteEstConnecte()) echo '<p>Vous êtes un administrateur.</p>'
?>
<hr>
<h3>Voici vos informations de profil</h3>
<p>Votre email : <?php echo $email;  ?> </p>
<p>Votre adresse : <?php echo $adresse;  ?> </p>
<p>Votre ville : <?php echo $ville;  ?> </p>


<img src="photo/welcome.jpg" alt="All might">


<?PHP 
require_once 'inc/bas.inc.php';