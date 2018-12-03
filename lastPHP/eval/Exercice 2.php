<?php 
$contenu= '';
#Voici la variable d'affichage avec laquelle on peut 


// Exercice 
#on créer la fonction
function converTe($prix, $formate){
    #On lui met 2 paramétre pour la saisie de l'internaute

// 2.a ||On contrôle d'abord les valeurs recues: Vous validez que le paramètre de format est bien "FR". La fonction retourne un message si ce n'est pas le cas.
if ($formate != 'FR') {
  return '<p>Le format demandé n\'est pas valide !</p>'; //return nous fait quitter la fonction , le reste du code qui suit n'est donc pas exécuté
  
}
if($formate == 'FR'){
			
            return 'Le prix total en $ vaux ' . ($prix * 1.16);
            #et la je dit que quoi que va rentrer l'internaute il sera converti en $
		}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function</title>
</head>
<body>
    <?php echo $contenu; ?>
</body>
</html>