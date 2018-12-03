<?php

function debug($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}


// -------------------------FONCTIONS MEMBRES--------------
// fonction m'indique si l'internaute est cnnecté :
 function internauteEstConnecte()
 {
    if (isset($_SESSION['membre'])) {
        return true; # si l'indice membre existe dans la sessios, c'est que l'internaute est passé par le formulaire connexion avec le bon login/mdp.On retourne donc "true"
    } else {
        return false; // dans le cas contraire (il n'est pas connecté) on retroune false
    }
    //ou
    #return (isset($_SESSION['membre']));
 }


//  fonction qui indique si le membre est un administrateur et est connecté :
function internauteEstConnecteEtAdmin() {
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) {
        return true;
    } else {
        return false;
    }
}


// -----------------FONCTION DE REQUETE------------------
function executeRequete($requete, $param = array())
{
    if (!empty($param)) { //si j'ai bien recu un array non vide (rempli), je peux faire le foreach dessus pour transformer les caractères spéciaux en entités HTML: 
        # code...
    
    foreach ($param as $indice => $valeur) {
        $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); //pour éviter les injections CSS et JS
        
        }
    }
    //...
    global $pdo; // permet d'avoir accés(à l'interieur e la fonction) a la variable de $pdo définit dan sl'espace globale (à l'exterieur de la fonction) 
    $resultat = $pdo->prepare($requete); // on prépare la requête fournie lors de l'appel de la fonction

     $resultat->execute($param); // on execute en liant les marqueurs aux valeurs qui se trouvent dans l'array $param fourni l'appel de la fonction

    return $resultat; // on retourne l'objet PDOStatement à l'endroit ou la fonction executeRequete est appelée
}