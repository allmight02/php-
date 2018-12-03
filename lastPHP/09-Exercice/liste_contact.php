<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/
$contenu = '';
$affiche = '';

#Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=contacts',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);

//On séléctionne tous les contact
  $resultat = $pdo->query("SELECT id_contact, nom, prenom, telephone FROM contact");






// var_dump($colonne);

	// debug($colonne); on a le nom du champ à l'indice "name"
	// echo '<pre>';
	// var_dump($colonne);
	// echo '</pre>';
	$contenu .= '<table class="table">';
$contenu .= '<tr>';
$contenu .= '<th>Nom</th>';
$contenu .= '<th>Prenom</th>';
$contenu .= '<th>Telephone</th>';
$contenu .= '<th>Action</th>'; 
$contenu .= '</tr>';


#on met la table dans un array associatif
while ($fichecontact = $resultat->fetch(PDO::FETCH_ASSOC)) {
	$contenu .= '<tr>';
	$contenu .='<td>'. $fichecontact['nom'] .'</td>'; #ici grâce a la boucle while on affiche les indice qu'il ya dans la table
	$contenu .='<td>'. $fichecontact['prenom'] .'</td>';
	$contenu .='<td>'. $fichecontact['telephone'] .'</td>';
	
	$contenu .= '<td><a href="?action='.$fichecontact['id_contact'].'">Details</a></td>';# ?action=details est mon $_GET
	$contenu .= '</tr>';
}
// $contenu .='<td><a href="?action=details"></a></td>';

$contenu .= '</table>';
var_dump($_GET);
 if (!empty($_GET['action'])) {
	 #On fait ue for each pour plusieur info
	 foreach ($_GET as $indice => $value) {
		 $_GET[$indice] = htmlspecialchars($value, ENT_QUOTES);
		 

	 }# Fin du for each 

	 // La requête preparée :
	 $resultat = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
	 #on met les 2 point comme marqueur par ce qu'on cherche a afficher les id contact il vérifie
	 $resultat->bindParam(':id_contact', $_GET['action']);

	 $succes = $resultat->execute();
	 #Apres chaque rêquete faire un fetchASSOC
	 $fichecontact = $resultat->fetch(PDO::FETCH_ASSOC);
	 //var_dump($fichecontact);

	 $affiche .= '<p>'.  $fichecontact['nom'] .'</p>';
	 $affiche .= '<p>'.  $fichecontact['prenom'] .'</p>';
	 $affiche .= '<p>'.  $fichecontact['email'] .'</p>';
	 $affiche .= '<p>'.  $fichecontact['annee_rencontre'] .'</p>';
	 $affiche .= '<p>'.  $fichecontact['type_contact'] .'</p>';

	 
	

	 if ($succes) {
		 $contenu .= '<td>C\'est OK</td>';
	 } else {
		  $contenu .= '<td>C\'est pas bon</td>';
	 }

	 




} # fin du if



?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Liste contact</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<h1>Liste des contacts</h1>
	<?php echo $contenu; ?>
	<?php echo $affiche; ?>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
<?php
/* Correction ******************************
$contenu = '';

#Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=contacts',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);

//On séléction toud les contacts
:
$query = $pdo->prepare("SELECT * FROM contact")
$query->execute(); //lesméthodes prepare et execute vont toujours ensemble

// On prepare la table
$contenu .= '<table class="table">';
$contenu .= '<tr>';
$contenu .= '<th>Nom</th>';
$contenu .= '<th>Prenom</th>';
$contenu .= '<th>Telephone</th>';
$contenu .= '<th>Action</th>'; 
$contenu .= '</tr>';


//On va faire une boucle while pour qu'il affiche les ligne , Tant qu'il y a un resultat dans $query on prépare la ligne de la table HTML correspondant au contact
while ($contact = query->fetchPDO::FETCH_ASSOC) {
	$contenu .= '<tr>';
	$contenu .='<td>'. $contact['nom'] .'</td>'; #ici grâce a la boucle while on affiche les indice qu'il ya dans la table
	$contenu .='<td>'. $contact['prenom'] .'</td>';
	$contenu .='<td>'. $contact['telephone'] .'</td>';
	$contenu .= '</tr>';
}

*/
