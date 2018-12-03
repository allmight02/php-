<?php
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

$query = $pdo->prepare("SELECT * FROM contact");
$query->execute(); //lesméthodes prepare et execute vont toujours ensemble

// On prepare la table
$contenu .= '<table border="1">';
$contenu .= '<tr>';
$contenu .= '<th>Nom</th>';
$contenu .= '<th>Prenom</th>';
$contenu .= '<th>Telephone</th>';
$contenu .= '<th>Action</th>'; 
$contenu .= '</tr>';


//On va faire une boucle while pour qu'il affiche les ligne , Tant qu'il y a un resultat dans $query on prépare la ligne de la table HTML correspondant au contact
while ($contact = $query->fetch(PDO::FETCH_ASSOC)) {
	$contenu .= '<tr>';
	$contenu .='<td>'. $contact['nom'] .'</td>'; #ici grâce a la boucle while on affiche les indice qu'il ya dans la table
	$contenu .='<td>'. $contact['prenom'] .'</td>';
    $contenu .='<td>'. $contact['telephone'] .'</td>';
    // print_r($contact);
    $contenu .= '<td><a href="?id_contact='.$contact['id_contact'].'">plus d\'info</a></td>';# ?action=details est mon $_GET

	$contenu .= '</tr>';
}
$contenu .= '</table>';

// Si on a cliqué sur un lien "plus d'infos":
if (isset($_GET['id_contact'])) { // si l'indice "id_contact" est dans le $_GET, donc dan sl'url c'est qu'on a demandé le détails d'un contact
    // var_dump($_GET);
    // echo 'C\'est ok '; // pour vérifier que l'on passe bien dans cette condition

#Ici on ne fait pas de foreach car on ne veux récuperer qu'une sele info
     $_GET['id_contact'] =  htmlspecialchars($_GET['id_contact'],ENT_QUOTES);
#Permet aussi de transformer les caractères spéciaux en etités HTML pour se prémunir des risques JS (   XSS) et CSS
    $query = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    #on fait une requête prépare de sélection du contat dans la BDD:
    
    $query->bindParam(':id_contact', $_GET['id_contact']);
    #on met bindParam par ce que le id_contact change

    #avec un prepare il ya toujours un execute
    $query->execute();

    #on transfoorme le résultat de la requête en un array associatif :
        $contact = $query->fetch(PDO::FETCH_ASSOC);

        //On affiche les infos du contact :
        $contenu .= '<h2>  Détail du contact</h2>';
        var_dump($contact);

        /* On peut l'ecrire aussi if (!empty($contact))*/if ($contact == false) {

            $contenu .= '<p>Ce contact existe pas</p>';
        } else {
            $contenu .= '<ul>';
                $contenu .= '<li>'. $contact['nom'] .'</li>';
                $contenu .= '<li>'. $contact['prenom'] .'</li>';
                $contenu .= '<li>'. $contact['telephone'] .'</li>';
                $contenu .= '<li>'. $contact['email'] .'</li>';
                $contenu .= '<li>'. $contact['annee_rencontre'] .'</li>';
                $contenu .= '<li>'. $contact['type_contact'] .'</li>';
            $contenu .= '</ul>';
        }

} #fin du if


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correction exo liste contact</title>
</head>
<body>
    <?php echo $contenu; ?>
</body>
</html>


$date = new DateTime('1997-10-02');// J'instancie la classe DATETIME que je stock dans une variable $date    

       "prenom" => "Jhordan",

       "nom" =>"Sinvry",

       "adresse" => "35 rue Jules micheley",

       "cp" => "92700",

       "ville" => "Colombess",

       "email" => "35 rue Jules michemey",

       'tel' => "0783309588",

       "date" => $date->format('d-m-Y')

   ];