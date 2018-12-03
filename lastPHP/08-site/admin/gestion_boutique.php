<?php
require_once '../inc/init.inc.php';
// -------------------  TRAITEMENT ---------------------

// 1- On vérifie que le membre est administrateur :
    if (!internauteEstConnecteEtAdmin()) {
        header('location:../connexion.php'); // je remonte dans le dossier parent pour accéder au fichier connexion.php
        
        exit(); // pour quitter le script
    }


    // 7-Suppression d'un produit :
    debug($_GET);
    if (isset($_GET['action']) && $_GET['action'] =='suppression' && isset($_GET['id_produit'])) { // si l'existe indice "action" dans $_GET et que sa valeur est "suprresion" et que existe aussi l'indice "id_produit", alors je peux traiter la suppression du produit demandé
        $resultat = executeRequete("DELETE FROM produit WHERE id_produit = :id_produit",  array(':id_produit' => $_GET['id_produit']));

        if ($resultat->rowCount() == 1) {
            # si le DELETE retourne 1 ligne, c'est l'id_produit existe et qu'il a pu être supprimé :
            $contenu .= '<div class="alert alert-success">Le produit n° '.$_GET['id_produit'] .'a bien été supprimé</div>';
        } else {
            // sinon c'est que l'id_produit n'existe pas ou plus
            $contenu .= '<div class="alert alert-danger">Erreur lors de la suppression du produit n° '. $_GET['id_produit'] .'</div>';
        }
        
    }







    //6- Affichage des produits dans une table HTML:
    // Exercice : affciher tous les produit sous forme de table HTml.cette table est stockée dans la variable $contenu. Tous les champs doivents être affichés. Pour la photo, vous affichez l'image (90px de largeur).

    // EX:JHO
    ###########################################################################
//     $resultat = $pdo->query("SELECT * FROM produit");
    
//     $contenu .= '<table class="table >';

//     $contenu .= '<tr>';
//     for ($i=0; $i < $resultat->columnCount() ; $i++) { 

//         $colonne = $resultat->getColumnMeta($i);
        
//         $contenu .= '<th>' . $colonne['name'] . '</th>';

        
//     }
//     $contenu .= '</tr>';
// $contenu .= '<th>action</th>';

// while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
//     $contenu .= '<tr>';

//     foreach ($ligne as $parcour => $valeur ) {
//         if ($parcour === 'photo') {
//             $contenu .= '<td><img src=../'. $valeur .'  alt="" style="width:90px;"></td>';
//         } else {
            
//             $contenu .='<td>' . $valeur . '</td>';
//         }
        
//     }
    
    
// } // fin While
// $contenu .= '</tr>';
// $contenu .= '</table>';
####################################################################

#-------- CORRECTION -------------
$resultat = $pdo->query("SELECT * FROM produit");
#voila une requete directe

$contenu .= 'Nombre de produit(s) dans la boutique : ' . $resultat->rowcount();

$contenu .= '<table class="table"';
// Affichage des entêtes dynamiquement :
$contenu .= '<tr>';
for ($i=0; $i < $resultat->columnCount() ; $i++) { 
    $colonne = $resultat->getColumnMeta($i);
    // debug($colonne); on a le nom du champ à l'indice "name"

    $contenu .= '<th>'. $colonne['name'] .'</th>';
}
$contenu .= '<th>action</th>'; // on ajoute cette colonne en plus affichés dynamiquement



$contenu .= '</tr>';


// Affichage des lignes:
while ($lign = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $contenu .= '<tr>';
    foreach ($lign as $index => $value) {
        if ($index == 'photo' && !empty($value)) {
            $contenu .= '<td><img src="../'.$value .'"alt="'. $lign['titre'] .'/" style="width: 90px"></td>';
        } else {
            $contenu .= '<td>'. $value .'</td>';
        }
    }
     $contenu .='<td>
     <a href="ajout_modif.php?action=modification&id_produit=' . $lign['id_produit'] . '">Modifier</a> <br>
     <a href="?action=suppression&id_produit=' . $lign['id_produit'] . '"  onclick="return(confirm(\'Etes vous certain de vouloir supprimer ce produit ?\'))">Supprimer</a> <br>
     </td>';

    $contenu .= '</tr>';
}
$contenu .= '</table>';


// --------------------- AFFICHAGE  -------------------
require_once '../inc/haut.inc.php';
?>

<h1 class="mt-4">Gestion boutique</h1>

<ul class="nav nav-tabs">
    <li><a href="gestion_boutique.php" class="nav-link active">Affichage des produits</a></li>
    <li><a href="ajout_modif.php" class="nav-link">Ajout d'un produit</a></li>
</ul>





<?php
echo $contenu; //Pour afficher la table des produits

require_once '../inc/bas.inc.php';


