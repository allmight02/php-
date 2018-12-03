<?php
// --------------------------------
// La superglobale $_SESSION
// --------------------------------
#Un fichier temporaire appelé session et créer sur le serveur avec un identifiant unique.Cete session est liée à un seul internaute car, dans le même temps, un cookie est déposé sur son poste avec l'identifiant à l'intérieur (au nom PHPSESSID). Ce cookie se détruit lorsqu'on quitte le navigateur.

#Le fichier de session peut contenir toutes sortes d'informations, y compris sensibles, car il n'est pas accesible ni modifiable par l'internaute.On peut donc y mettre des login/mdp panier d'achat avant, paiement,.....

#Si l'internaute tente de modifier ce cookie, le lien avec la session est rompu automatiquement, et donc l'internaute est déconnecté.

#Les données du fichier session sonr accesibles et manipulables à partir de la superglobale $_SESSION.

// Ouverture ou création d'une session :
session_start(); //permet de créer une sessions si elle n'existe pas, ou de l'ouvrir si elle existe déjà (on a recu un cookie avec l'ID de session à l'inérieur)

// Remplissage de la session :
$_SESSION['pseudo'] = "Tintin";
$_SESSION['mdp'] = 'milou'; //$_SESSION étant un array on utilise la syntaxe avec "[]"

echo '<br> 1-A La session après remplissage :';
print_r($_SESSION);
// Pour visualiser le fichier de sesion: xampp>tmp

// Vider une partie de la session :
unset($_SESSION['mdp']); #supprime l'indice "mdp" et la valeur correpondante

echo '<br> 2- La session après suppression du mdp :';
print_r($_SESSION);

# Supprimer entièrement une session :
// session_destroy(); #On demande la supression de la sessions, mais il faut savoir que le session_destroy() est d'abord lu puis exécuter seulement à la fin du script

echo '<br> 3- La session après session_destroy() :';
print_r($_SESSION); #On voit encore notre session car a la fin du script se situe après cette.Cependant si on regade danas le dossier tmp la session est bien supprimée.

