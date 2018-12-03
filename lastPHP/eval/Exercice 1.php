<style>
h2 { color: red}
</style>
<?php 
// ------------------------------
echo '<h2> *** Exercice 1 ***</h2>';
// ----------------------

$contenu= '';
#Voici la variable d'affichage qu'on va concaténer


// Exercice 1
#on créer le tableau
$coordonnees = array(
    'prenom' => 'Jhordan',
    'nom' => 'Sinvry',
    'adresse' => '35 rue Jules Michelet',
    'code_postal' => '92700',
    'ville' => 'Colombes',
    'email' => 'jsinvry@gmail.com',
    'telephone' => '07-83-30-95-88',
    'Date_anniv' => '02/10/1997',

    // "date" => $date->format('d-m-Y')
);



$contenu .= '<table border="1">';
$contenu .= '<tr>';
$contenu .= '<th>Nom</th>';
$contenu .= '<th>Prenom</th>';
$contenu .= '<th>adresse</th>'; 
$contenu .= '<th>code_postal</th>'; 
$contenu .= '<th>Ville</th>'; 
$contenu .= '<th>email</th>'; 
$contenu .= '<th>telephone</th>';
$contenu .= '<th>Date_anniv</th>';

$contenu .= '</tr>';
#On fait les titre simplement 




foreach ($coordonnees as $parcour => $données) {
    
	$contenu .= '<tr>';
    $contenu .='<td>'. $coordonnees['nom'] .'</td>'; #ici grâce a la boucle for comme il ya plusieur champs j'ai fait plusieur j'ai fait une for each on affiche les indice qu'il ya dans la table
    
	$contenu .='<td>'. $coordonnees['prenom'] .'</td>';
    $contenu .='<td>'. $coordonnees['adresse'] .'</td>';
    $contenu .='<td>'. $coordonnees['code_postal'] .'</td>';
    $contenu .='<td>'. $coordonnees['ville'] .'</td>';
    $contenu .='<td>'. $coordonnees['email'] .'</td>';
    $contenu .='<td>'. $coordonnees['telephone'] .'</td>';
    $contenu .='<td>'. $coordonnees['Date_anniv'] .'</td>';
    // print_r($contact);

   break;
   #J'utilise le break pour qu'il sorte de la boucle des que l'instruction est faite car si je ne le fait pas il va me le répéter sur plusieur ligne

	$contenu .= '</tr>';
}
$contenu .= '</table>'; 
#on ferme la table



// #On effectue la boucle for pour parcourir le tableau
//  foreach ($coordonnees as $parcour => $données) {
// //   var_dump($parcour);
//   if ($parcour == 'prenom') {

//       echo ' '. $données .'</h3>';
//   } else {
//       echo '<p>'. $données . '</p>';
//   }
//  }
 






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo $contenu; ?>
</body>
</html>