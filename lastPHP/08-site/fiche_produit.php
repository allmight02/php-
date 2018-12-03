<?php
require_once 'inc/init.inc.php';
// -------------------  TRAITEMENT ---------------------
// variable d'affichage
$panier = '';
$suggestion = '';



## 1- CONTROLE DE L'EXISTENCE DU PRODUIT DEMANDE (un produit en favori a pu être supprimé de la BDD...) :
if (isset($_GET['id_produit'])) {
    # si un produit a été sélectionné : 
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit",array(':id_produit' => $_GET['id_produit']));

    if ($resultat->rowCount() == 0) {
        # s'il n'y a pas de ligne dans $resultat, c'est que le produit n'existe pas
    }
    
    ## 2- Affichage des infos du produit
    $produit = $resultat->fetch(PDO::FETCH_ASSOC); // On ne fait pas de boucle while ici car on est certait de n'avoir qu'un seul par id_produit si il y aurait plus de produit ou ligne sa serais une boucle while

    extract($produit); #créer autant de variable qu'il y a d'indice dan sl'array $produit. Celle-ci ont pour nom le nom de l'indice et pour valeur la associé a cette indice

    ## 3- Affichage du formulaire d'ajout au panier si le stock est positif
    if ($stock > 0) {
        $panier .= '<form method="post" action="panier.php">';

            $panier .= '<input type="hidden" name="id_produit" value="'. $id_produit .'">'; // pour donner l'id du produit sélectionné au panier

            // Sélecteur de quantité d eproduit :
            $panier .= '<select name="quantite" class="custom-select col-sm-2">';
                for ($i=1; $i <= $stock && $i <= 5; $i++) { 
                    $panier .= '<option>'. $i .'</option>';
                    # code...
                }
            $panier .= '</select>';

            $panier .= '<input type="submit" name="ajout_panier" value="Ajouter au panier" class="btn btn-info col-sm-8 ml-2">';





        $panier .= '</form>';
        $panier .= '<p>Nombre de produit(s) disponible(s):'. $stock .'</p>';


        # code...
    } else {
        #si le stock est nul on t met le message suivant :
        $panier .= '<p>Produit en rupture de stock !</p>';
    }



}else {
    # sinon, m'indice "idi_produit n'existe pas dans l'url, ce qui signifie que l'on a accédé à la page directement sans choisir de produit : on redirige donc vers la boutique "
    header('location:boutique.php');
    exit();
}


// EXERCICE :
// Créer des suggestions de produits : afficher 2 produits (photo et titre) aléatoirement appartenant à la même catégorie que le produit affiché. Vous utilisez la variable $suggestion pour afficher le contenu.
$resultat = executeRequete(" SELECT photo, titre, id_produit FROM produit WHERE categorie = :categorie AND id_produit != :id_produit ORDER BY RAND()  LIMIT 2;" ,array( ':categorie' => $produit['categorie'],
':id_produit' => $produit['id_produit']
 ));

while ($j = $resultat->fetch(PDO::FETCH_ASSOC)) {

$suggestion .= '<div class="col-md-3">';

    $suggestion .= '<a href="?id_produit=' . $j['id_produit'] . '">
                    <img  class="img-fluid" style="width:90px;"src="' . $j['photo'] . '" alt="' . $j['titre'] . '">
                    </a>';

    $suggestion .= '</div>';




    /*CORRECTION
      $resultat = executeRequete(" SELECT photo, titre, id_produit FROM produit WHERE categorie = :categorie AND id_produit <> id_produit ORDER BY RAND()  LIMIT 2;

      **$resultat ici vaut la requette**

    while ($produit_suggestion =$resultat->fetch(PDO::FETCH_ASSOC)) {

        ***A LA BOUCLE WHILE  le $produit_suggestion passe en un array associatif ($produit_suggestion =$resultat->fetch(PDO::FETCH_ASSOC)***

    $suggestion .= '<div class="col-sm-3">';
            suggestion .= '<a href="?id_produit=' .$produit_suggestion['id_produit'] . '">
                <img  class="img-fluid" style="width:90px;"src="' . $produit_suggestion['photo'] . '" alt="' . $produit_suggestion['titre'] . '">
            </a>';

    $suggestion .= '</div>';


    }

     */
}













// --------------------- AFFICHAGE  -------------------
 require_once 'inc/haut.inc.php';
?>

<div class="row">
    <div class="col-12">
        <h1><?php echo $titre; ?></h1>



    </div>
    <div class="col-md-8">
        <img src="<?php echo $photo; ?>" alt="<?php echo $titre; ?>" class="img-fluid">
    </div>


    <div class="col-md-4">
        <h3>Description</h3>
        <p><?php echo $description; ?></p>
        <h3>Détails</h3>
        <ul>
            <li>Catégorie : <?php echo $categorie; ?></li>
            <li>Couleur : <?php echo $couleur; ?></li>
            <li>Taille : <?php echo $taille; ?></li>
        </ul>
        <h4>Prix : <?php echo number_format($prix, 2, ',', ''); ?></h4>

        <?php  echo $panier; ?>

        <p>
            <a href="boutique.php?categorie=<?php echo $categorie ?>">Retour vers la catégorie '<?php echo $categorie ?>'</a>
        </p>
    </div>



<div class="row">
    <div class="col-12">
        <h3>Suggestions de produits</h3>
    </div>
    <?php echo $suggestion; ?>

</div>




</div> <!--ROW-->
<!--Exercice : suggestions de produits-->


<?php
require_once 'inc/bas.inc.php';
