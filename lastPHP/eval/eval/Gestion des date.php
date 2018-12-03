<style>
h2 { color: orange}

</style>
<?php
// --------------------------------------------
echo '<h2>*** Gestion des dates ***</h2>';
// --------------------------------------------
echo date ('d/m/Y H:i:s') . '  d/m/Y H:i:s<br>'; // date ()retourne la date maintenant selon le format indiqué. d pour jour, m pour mois, Y pour année sur 4 chiffres, y pour année sur 2 chiffres, H pour heure sur 24h, h pour heure sur 12h, i pour minute et s pour seconde.

echo date('Y-m-d') . ' Y-m-d<br>'; // on peut changer l'ordre des paramètres ainsi que le séparateur

// -----SOUS-CHAP
// Le timestamp :
// Le timestamp est le nombre de seconde écoulée entre une certaine date et le 1er janvier 1970 à 00:00:00. Cette date correspond à la création du système UNIX.
// Ce système de timestamp est utilisée par de nombreux language de programmation dont le PHP et le JavaScript.

// --
echo time() . ' time (timestamp)<br>'; # retourne l'heure actuele en timestamp

// ---
// Changer le format d'une date (méthode procédurale) :
    $dateJour =  strtotime('27-09-2018'); #Transforme la date eprimer en string en timestamp
    echo $dateJour . '<br>'; // affiche le timestamp du jour

    var_dump(strtotime('13-13-2018')); #ici retourne false car la date fourni n'est pas valide.Cette fonction permet donc de valider une date.

    $dateFormat = strftime('%Y-%m-%d', $dateJour); #transforme une date donnée en timestamp selon le format indiqué, ici en année-mois-jour
    echo $dateFormat . '<br>';
    // ---
    // Changer le formaat d'une date (méthode objet): *******point bonus pour l'eval
        $date = new DateTime('11-04-2017'); # $date est un objet date qui represente le 11-04-2017
        echo $date->format('Y-m-d') . '<br>'; #on peut formater cet objet date on appelant sa méthode format() et en lui indiquant les paramètre du format,ici 'Y-m-d'.Affiche 2017-04-11.