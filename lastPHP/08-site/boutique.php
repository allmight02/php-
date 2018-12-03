<?php
require_once 'inc/init.inc.php';
// -------------------  TRAITEMENT ---------------------
// 1-AFFICHAGE DES CATEGORIE:
$resultat = executeRequete("SELECT DISTINCT categorie FROM produit");

$contenu_gauche .= '<div class="list-group">';

    // Affichage de la categorie "tous" par défaut :
    $contenu_gauche .= '<a href="?categorie=tous" class="list-group-item">Tous les produits</a>';

    // Affichage des autres catégories provenant de la BDD :
    while ($cat = $resultat->fetch(PDO::FETCH_ASSOC)) { //Fetch_ASSOC créer un array associatif appelé $cat à chaque tour de boucle
        debug($cat);
        $contenu_gauche .= '<a href="?categorie='. $cat['categorie'] .'" class="list-group-item">'. $cat['categorie'] .'</a>'; 
    }

$contenu_gauche .= '</div>';


// 2- AFFICHAGE DES PRODUIT EN FONCTION DE LA CATEGORIE:
if (isset($_GET['categorie']) && $_GET['categorie'] != 'tous') {
    # si existe l'indice "categorie" dans l'urk, et que sa valeur est différente de "tous", on sélectionne la catégorie demandée :
        $donees = executeRequete("SELECT * FROM produit WHERE categorie = :categorie",array(':categorie' => $_GET['categorie']));
} else {
    # sinon si "categorie" n'existe pas dans l'url ou qu'elle égal à "tous" on selectionne TOUS les produits:
    $donees = executeRequete("SELECT * FROM produit");

}
while ($produit = $donees->fetch(PDO::FETCH_ASSOC)) {
    $contenu_droite .= '<div class="col-sm-4 mb-4">';
        $contenu_droite .='<div class="card">';

            // image cliquable
            $contenu_droite .= '<a href="fiche_produit.php?id_produit='. $produit['id_produit'] .'">
            <img src="'.$produit['photo'].'" alt="'. $produit['titre'].'" class="card-img-top">
            </a>';

            #infos du produit
            $contenu_droite .= '<div class="card-body">';
            $contenu_droite .= '<h4>'. $produit['titre'] .'</h4>';
            $contenu_droite .= '<h5>'. number_format($produit['prix'], 2, ',', '') .'€</h5>';
            # number_format(nombre, nomre de décimalles, séparateur des décimales, séparateur des miliers)
            $contenu_droite .= '<p>'. $produit['description'] .'</p>';

            
            $contenu_droite .= '</div>';
        $contenu_droite .= '</div>';
    $contenu_droite .= '</div>';
}









// --------------------- AFFICHAGE  -------------------
 require_once 'inc/haut.inc.php';
?>
<h1 class="mt-4">Vêtement</h1>
<div class="row">
    <div class="col-md-3">

    <?php echo $contenu_gauche; //Pour afficher les catégorie ?>

    </div>
    <div class="col-md-9">
        <div class="row">

    <?php echo $contenu_droite; //Pour afficher les produit ?>

    </div>
    </div>

</div>


<?php
require_once 'inc/bas.inc.php';

