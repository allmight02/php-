<?php
require_once 'inc/init.inc.php';
$message_deconnexion = '';

// 2- Déconnexuin de l'internaute
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion' ) { // si on recoit en GET dans l'url l'indice "action" et la valeur "deconnexion" c'est que le membre veut se deconnecter.
    
    unset($_SESSION['membre']); //on supprime les infos du membre dans la session
    
     $message_deconnexion .='<div class="alert alert-success">Vous avez été déconnécté</div>';
} 

//3- L'internaute connecté est redirigé vers son profil : il n'ya pas de raison qu'il puisse se reconnecter une seconde fois
if (internauteEstConnecte()) {
    header('location:profil.php');
    exit();
}











// 1- Traitement du formulaire de connexion :
debug($_POST);
if ($_POST) {
    # controles sur le formulaire :
        if (empty($_POST['pseudo']) ) {//empty vérifie si c'est vide (0,NULL '',false ou non définit)
            $contenu .= '<div class="bg-danger">Le pseudo est requis.</div>';
        } 
        if (empty($_POST['mdp']) ) { //empty vérifie si c'est vide (0,NULL '',false ou non définit)
            $contenu .= '<div class="bg-danger">Le mot de passe est requis.</div>';
        } 
        if (empty($contenu)) { //si $contenu , c'est qu'il n'y a pas d'erreur sur le formulaire: on peut donc interroger la BDD
            $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo' => $_POST['pseudo'], 'mdp' => $_POST['mdp']));

        if($resultat->rowCount() > 0) { // si il y 1(ou plusieurs) ligne dans $resultat, le pseudo et le  mdp existent pour le même membre
            //..
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il n'ya qu'une seule ligne de résultat dans la requête (les pseudos sont uniques)

            $_SESSION['membre'] = $membre; // nous créons une session appelée "membre" qui contient les informations provenant de la BDD

            header('location:profil.php'); // on redirige (redirection) l'internaute vers la page située à l'url profil.php
            exit(); // et on quitte le script





        } else {
            //sinon il n'ya pas de correspondance entre le login et le mdp pour le même membre :
            $contenu .= '<div class="bg-danger">Erreur sur les identifiants ou le Mot de passe.</div>';
        }

        } # FIN IF (EMPTY)
}





// ---------------- AFFICHAGE -----------------------
require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Connexion</h1>

<?php echo $message_deconnexion; ?>

<p>Veuillez indiquer vos identifiant pour vous connecter</p>

<?php echo $contenu; ?>


<form action="" method="post">

<label for="pseudo">Pseudo</label> <br>
<input type="text" id="pseudo" name="pseudo"> <br> <br>

<label for="mdp">Mot de passe</label> <br>
<input type="password" name="mdp" id="mdp"><br> <br>


<input type="submit" value="Se connecter" class="btn bg-dark" style="color : #fff;">


</form>




<?php
require_once 'inc/bas.inc.php';