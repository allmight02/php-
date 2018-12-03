<?php
echo '<h1>EXERCICE 1</h1>';
/* 
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, '?', Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. 	

*/

// $pays[0] = 'France';
// $pays[1] = 'Italie';
// $pays[2] = 'Espagne';
// $pays[3] = 'inconnu';
// $pays[4] = 'Allemagne';

$destination = array(
    'France' => 'Paris',
    'Italie' => 'Rome',
    'inconnu' => '?',
    'Allemagne' => 'Berlin',
);
 

foreach ($destination as $pays => $capitale) {


   if ($pays === 'inconnu') {
echo '<p>Ca n\'existe pas !</p>';
       
    } else {
       echo '<p>La capitale '. $capitale  . ' ce situe en '.$pays .' </p>';
    }
    
}

echo '<hr><br>';
