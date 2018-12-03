<?php
/*
  1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
  Cette fonction prend 2 paramètres : une date et le format de conversion de sortie "US" ou "FR". Pour faire cette conversion, vous utilisez la classe DateTime.
	  
  2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
  
  3- Vous validez que la date fournie est bien une date. La fonction retourne un message si ce n'est pas le cas.
  
*/

#1.Créer la fonction
//  function ConverDate($date1, $format)
//  {
    
//   // 2.
//   if ($format != 'US' && $format != 'FR') {
//     echo '<p>Ca n\'existe pas !</p>';
    
    
//   }






//   if ($format == 'US') {
//   return '<p>Le format est bien "US"</p>';

//     $date2 = new DateTime($date1);
//     $two = $date2->format('Y-m-d') . '<br>';

//   return '<p>La date en US '. $two .'</p>';

  

//   } /*Fin du if */ 
//   else {

//     $date2 = new DateTime($date1);
//     $two = $date2->format('d-m-Y') . '<br>';
//     return '<p>Le Format est en francais '. $two .'</p>';
    

//   }

  
  
//  }//Fin fonction
//  echo ConverDate('10-10-2018','');
#------------------------------------------------------------------
// CORRECTION

#1.a ||Créer la fonction
function afficheDate($prix, $formate)
{

// 2.a ||On contrôle d'abord les valeurs recues: Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
if ($formate != 'FR' && $formate != 'US') {
  return '<p>Le format demandé n\'est pas valide !</p>'; //return nous fait quitter la fonction , le reste du code qui suit n'est donc pas exécuté
  
}

// 3.a ous validez que la date fournie est bien une date. La fonction retourne un message si ce n'est pas le cas.
if (!strtotime($date)) {
  return '<p>La date est invalide</p>'; #le return renvoi false en cas de non date
  # le strtotime permet de vérifier si le format est bien un format type date
}



  # 1.b ||Traitement de l'affichage de la date:
  $objetDate = new DateTime($date);

  if ($formate == 'FR') {

    return $objetDate->format('d-m-Y');
    # Vérification 

  } elseif ($formate == 'US') {

    return $objetDate->format('Y-m-d');
    # Vérification si format est == US selon ce que va taper l'internaute
  }
  
}

echo afficheDate('15-08-2018','');