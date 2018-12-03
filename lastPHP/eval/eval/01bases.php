<style>
h2 { color: red}
</style>

<?php

// ------------------------------
echo '<h2> *** Les balises PHP ***</h2>';
// ----------------------

?>

<?php
// pour ouvrir un passage en PHP, on utilise la balise précédente
//  pour fermer un passe en PHP, on utilise la balise suivante :
?>
<p>Bonjour</p> <!--En dehor des balises d'ouverture et de fermeture PHP, nous pouvons écrire du HTML quand on est dans un fichier ayant l'extension .php-->

<?php
// Vous n'etes pas obligé de fermer un passage en PHP en fin de script

// ------------------------------
echo '<h2> *** Afiichage ***</h2>';
// -----------------------------

echo 'Bonjour <br>'; // echo est une instruction qui permet d'afficher dans le navigateur. Toutes les instruction se termine par un point virgule ";" Dans un echo nous pouvons mettre aussi HTML

print 'Nous somme mardi <br>'; // print est une autre instruction d'affichage. Pas (ou peu) de différence avec echo

// Autres instructions d'affichage que nous verrons plus loin: 
// print_r(); // Utiliser en phase de devloppement
//  var_dump(); // comme un console.log mais afficher dans le navigateur

// pour faire un commentaire sur une seule ligne

/*
pour faire un commentaire sur plusieur ligne
*/

#autre syntaxe de commmentaire sur une suele ligne
// ------------------------------
echo '<h2>*** Variables : déclaration / affectation / types ***</h2>';
// ------------------------------
//  Definition : Une variable c'est un espace mémoire qui porte un nom et permettant d conserver uen valeur.
// En PHP on déclare une variable avec le signe $.

 $a = 127; // affectation de la valeur 127 à la variable $a
 echo gettype($a); // gettype() est une fonction prédéfinie qui indique le type d'une variable.Ici il s'agit d'un integer (entier)

 echo '<br>';

$a = 'une chaîne de caractères';
echo gettype($a); // affiche un string

echo '<br>';

$b = '127';
echo gettype($b); //affiche string car un nombre ecrit entre quotes est interprété comme un string

echo '<br>';

$a = true; // ou false
echo gettype($a); // affiche boolean

// par convention, un nom de variable commence par une lettre minuscule, puis on met une majuscule à chaque mot. Il peut contenir des chiffres , jamais au debut ou un underscore, jamais au début car signification particulière en objet, ni à la fin).

// ------------------------------
echo '<h2>*** Concaténation ***</h2>';
// ------------------------------

$x = 'Bonjour';
$y = 'tout le monde';

echo  $x . $y . '<br>'; // Le point e concaténation peut être traduit par 'suivi de'

// Remarque sur echo : 
echo $x, $y, '<br>'; // Spécifique aux echo on peut séparer les élément à afficher par une virgule. Cette syntaxe est spécifique au echo, et ne marche pas avec print.

//-------------
// Concaténation lors de l'affectation : 

$prenom1 = 'Bruno';
$prenom1 = 'Claire';
echo $prenom1 . '<br>'; // affiche  Claire 

$prenom2 = 'Nicolas';
$prenom2 .= ' Marie'; // On ajoute a nicolas "Marie" grâce a ".="
echo $prenom2 . '<br>'; // AFFiche "Nicolas Marie" grace à l'opérateur combiné ".=", la valeur "Marie" vient s concaténer à la valeur "Nicolas" sans la remplacer


// ------------------------------
echo '<h2> *** Guillemets et quotes ***</h2>';
// ------------------------------
$message = "aujourd'hui"; // ou bien :
// $message = 'aujourd\'hui'  on echappe les apostrophe dans les quotes simple avec \ (alt gr +8).

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // dans les guillemets, la variable est évaluée : c'est son contenu qui est affiché , ici "Bonjour"
echo '$txt tout le monde <br>';  // dans des quotes simples, la variable n'est pas évaluée, elle est traitée comme du texte brute. Affiche '$txt'.

// ------------------------------
echo '<h2>*** Constante et constante magique ***</h2>';
// ------------------------------

//Une constante permet de conserver une valeur sauf que celle-ci ne peut pas être modifiée durant L'exécution du ou de scropts.Utile pour par exemples conserver les paramétre de connexion à la BDD sans pouvoir les modifier une fois définies.

define('CAPITALE', 'Paris'); // On declare une constante avec la fonction prédefinie : define() qui s'appelle CAPITALE et prend pour valeur "Paris". Par convention les constantes sont toujours écrites en majuscules.

echo CAPITALE . '<br>'; // affiche Paris

// Deux constante magiques :
echo __DIR__ . '<br>'; // affiche le chemin complet vers le dossier de notre fichier
echo __FILE__ . '<br>'; // affiche le chemin complet vers le fichier (dossier + nom du fichier)

// EXERCICE
// Vous affcihez Bleu-blanc-Rouge (avec les tirets) en mettant le texte de chaque couleur dans des variables.
$couleur1 = 'Bleu';
$couleur2 = 'Blanc';
$couleur3 = ' Rouge';

echo $couleur1 . '-' . $couleur2 . '-' . $couleur3 .'<br>';
//2 eme solution
echo "$couleur1-$couleur2-$couleur3 <br>";

// ------------------------------
echo '<h2>*** Opérateur arithmétiques ***</h2>';
$a = 10;
$b = 2;
echo $a + $b . '<br>'; // affiche 12
echo $a - $b . '<br>'; // affiche 8
echo $a * $b . '<br>'; // affiche 20
echo $a / $b . '<br>'; // affiche 5
echo $a % $b . '<br>'; // affiche 0 (le reste d'une division entiere). Exemple .3%2 si on a 3 billes répartie entre 2 personnes, il nous en reste 1 dans la main

//-----------------------------------------------------------------------------
//Operation et affectation combinées :
$a = 10;
$b = 2;

$a += $b; // équivaut à $a + $b, $a vaut donc au final 12
$a -= $b; // équivaut à $a - $b, $a vaut donc au final 10
$a *= $b; // équivaut à $a * $b, $a vaut donc au final 20
$a /= $b; // équivaut à $a / $b, $a vaut donc au final 10
$a %= $b; // équivaut à $a % $b, $a vaut donc au final 0

//Exemple d'utilisation : pratique pour faire des caluls de quantités dans les paniers d'achat (+= et -=)

// ---------------------------------------------------------------------
// Incrémenter et décrementer
$i = 0;
$i++; //= "$i +1" on ajoute 1 a $i qui vaut au final 1
$i--; // on retire 1 à $i qui vaut au final 0

$i = 0;
$k = ++$i; //la variable $i est incrémentée de 1, puis elle est retournée : on affecte donc 1 à $k
echo '$i vaut' . $i . '<br>';
echo '$k vaut' . $k . '<br>';

$i = 0; 
$k = $i++; //la variable $i est d'abord retournée, puis elle est incrémentée de 1
echo '$i vaut' . $i . '<br>'; //1
echo '$k vaut' . $k . '<br>';//0

// ------------------------------
echo '<h2>*** Structure conditionnelles - opérateurs de comparaison ***</h2>';
// --------------------------------------------
$a = 10;
$b = 5;
$c = 2;
// ----
// if ..... else
if ($a > $b) { #si la condition est evalue a true on execute les acolade qui suivent

    # If ou else est une structure donc il n'y a pas de ";" 
    echo '$a est supperieur à $b <br>';

} else { #sinon si c'est faut "False" on exécute le else

    echo 'Non, c \'est $b qui est supérieur ou égal à $a <br>';
    # Insctruction ce termine par un ";"
}

#--------------
#L'opérateur AND écrit && (ET LOGIQUE):
if ($a > $b && $b > $c) { // si $a est superieur à $b ET que dans le même temps $b est supérieur à $c, alors on entre dans les accolades
    
    echo 'OK pour les 2 conditions <br>';
    # code...
}
//----
// L'operateur OR ecrit || :
if ($a ==9 || $b > $c) { // si $a est egal a 9 (opérateur ==) OU que $b est supérieur à $c, alors on entre dans les accolades :
    echo'OK pour au moins une des 2 conditions <br>';
}

// -------
// if ... elseif....else:
$a = 10;
$b = 5;
$c = 2;
if ($a == 8) {
    echo '$a est égal à 8 <br>';
    # code...
} elseif ($a != 10) {
    echo '$a est différent de 10 <br>';
    # code...
} else {
    echo 'Les 2 conditions précédentes sont fausses <br>';
    # code...
}

// Notes : on ne fait jamais suivre un else par une condition (sinon utiliser un elseif). On ne met pas de ";" à la fin d'une condition car il s'agit d'une structure.

//---
// L'opérateur XOR :
$question1 = 'mineur';
$question2= 'je vote'; // exemple d'un questionnaire statistique

if ($question1 == 'mineur' XOR $question2 == 'je vote' ) {
    echo 'Vos réponses sont cohérentes <br>';
    # code...
} else {
    echo 'Vos réponse ne sont pas cohérentes <br>';
    # code...
}
#XOR = OU ALORS EXECUTE SOIS L'UN SOIS L'AUTRE UN PEU COMME LE "ET LOGIQUE" 
#OU EXCLUSIF seuleùent une des 2 conditions doit ^étre vraie (soit l'une soit l'autre) Si les 2 conditions sont vraie, alors l'expression complète est fausse : c'est le cas ici , on entre donc le else. il faut une des 2 vrai

// ---------
// Forme contractée de la condition, dite ternaire :

echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>'; 
// dans la ternaire, Le "?" remplace if, et le ":" remplace else. Ici, si $a égal 10, je fais echo du 1er string, sinon du second

// ou encore: 
$resultat = ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10';
echo $resultat;

// -----------------
// Comparaison en == et en ===
$varA = 1; //integer
$varB = '1'; // string

if ($varA == $varB) echo '$varA est égal à $varB en valeur uniquement <br>';
if ($varA === $varB) {
    echo '$varA est égal à $varB en valeur ET en type <br>';
} else {
    echo '$varA est différent de $varB en valeur ou en type <br>';
}
/**
 * "=" signe d'affectation
 * "==" signe de comparaison en valeur
 * === signe de comparaison en valeur et en type
 */

//  ----
// isset(existe) et empty(vide):
// Définitions : 
// isset() teste si c'est defini (si existe) et a une valeur non NULL 
//  empty() test si c'est vide, c'est-a-dire 0 , string vide '',NULL, false concidere comme vide ou non defini
$var1 = 0;
$var2 = '';
if (empty($var1)) echo '0, vide, NULL, false ou non défini <br>'; // ici la condition est vraie car $var1 est vide au sens de empty (voir la définition ci-dessus)
if (isset($var2)) echo 'existe et non NULL<br>'; // la condition est car $var2 existe bien (et est non NULL)

#Si on ne declare pas les variables $var1 et $var2 lignes 279 et 280, la condition avec empty reste vraie (car non definie), mais la condition avec isset devient fausse ( car la variable ne serait pas definie)

// Exemple d'utilisation : empty pour vérifier qu'un champ de formulaire est vide. Isset qu'une variable existe bien avant de l'utiliser.

// -----
// L'operateur NOT écrit "!" :
$var3 = 'une chaîne de caractères';
if (!empty($var3)) echo '$var3 n\est vide <br>'; // ! pour NOT. il s'agit d'une négation qui transforme false en true et inversement (!false vaut true et true vaut false). Litteralement on teste ici si $var3 N'est PAS vide.

// -------

#phpinfo(); pour verifier la version de notre php sur notre server local

// PHP7 : entrer une valeur dans une variable si elle existe : elle ne prend que celle qui existe
$var1 = $variableInconnue ?? 'valeur par défaut';

$var1 = $variableInconnue ?? $varAutre ?? 'valeur par défaut'; #l'opérateur "??" indique qu'il faut prendre la première variable ou valeur qui existe : $variableInconnue n'existant pas, on pase $varAutre qui n'existe pas non plus , donc on prend la 'valeur' par defaut' pourl'affecter à $var1
echo $var1; #affiche la valeur par defaut

// Utilisation : pour pré-remplir les values des formulaires quand l'internaute aura saisie et envoyé des valeurs.



// --------------------
// --------------------------------------------
echo '<h2>*** Condition switch ***</h2>';
// --------------------------------------------
// Laa condition switch est une autre syntaxe du if / elseif /else quand on veut comparer une variable à une multitude de valeurs.

$couleur = 'jaune';
switch ($couleur) {
    case 'bleu':
    #On compare $couleur a la valeur des case et execute le code qui suis tout les ":" si elle correspond 
    echo 'Vous aimez le bleu <br>';
        break; #il sert à sortir de la condtion et de continuer le script il et obligatoire
    
    case 'rouge':
    echo 'Vous aimez le rouge <br>';
        # code...
        break;
        case 'vert':
        echo'Vous aimez le vert <br>';
            # code...
            break;

            default: #cas par défault si on entre pas dans les case précédents (équivalent du else)
            echo 'Vous n\'aimez aucune couleur <br>';
            break;
}

// ---------------
// Exercice : réécrire Le switch précédent en condition if... classiques . On doit obtenir le même résultat.

$couleurs = 'jaune';
if ($couleurs == 'bleu' ) {
    # code...
    echo 'Vous aimez le bleu';
} elseif ($couleurs == 'rouge' ) {
    echo 'Vous aimez le rouge';
    # code...
} elseif ($couleurs == 'vert') {
    echo 'Vous aimez le verts';
    # code...
} else {
    echo 'Vous n\'aimez aucune couleur <br';
    # code...
}

echo '<hr>';
// --------------------------------------------
echo '<h2>*** Quelques fonctions prédéfinies ***</h2>';
// --------------------------------------------

// Une fonction prédéfinie permet de réaliser yun traitement spécifique prédéterminé dans le langage PHP.


// -----
// strpos : 
$email1 = 'jhordan@site.fr';
echo strpos($email1, '@'); #affiche la position de @ en comptant à partir de 0
echo '<br>';

$email2 = 'bonjour';
echo strpos($email2, '@'); // cette ligne n'affiche rien, pourtant la fonction retourne bien quelque chose : false
var_dump(strpos($email2, '@')); // grâce au var_dump on peut apercevoir ce que retourne cette fonction si l'@  n'est pas trouve var_dump est une instruction d'affichage améliorée que l'on utilise en phase de dévloppement.
echo '<br>';

// ----
// strlen: 
$phrase = 'mettez une phrase ici à cet endroit';
echo strlen($phrase); // strlen retourne la taille d'une chaîne de d'octets de cette chaînr, un caractère accentué valant 2 octets).

echo '<br>';
// -----
// substr :
$texte = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, necessitatibus? Sed molestias suscipit iure, sint ducimus minus est modi officia asperiores tempore, deleniti possimus doloribus! Cumque hic temporibus nesciunt sint.';


echo substr($texte, 0, 20) . '...<a href="">lire la suite</a>'; // substr retourne une partie du string de la postion 0 et sur 20 caractère 

echo '<br>';

// ---
// trim :
$message = '    HEllo world    ';
echo strlen($message) . '<br>'; // on compte la taille avec les espaces
echo strlen(trim($message)) . '<br>'; // on compte la taille une fois les espaces spprimés avec trim en début et fin de string

// ----
// die() et exit ():
// exit('un message'); // quitte le script après avoir afficher le message 
// die('un message'); // fait la même chose : die() est un alias de exit(    ) 
echo '<br>';
echo '<hr>';
// --------------------------------------------
echo '<h2>*** Les fonctions Utilisateur ***</h2>';
// --------------------------------------------
// Des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom qu'on appelle au besoin pour exécuter le code qui s'y trouve.


// Declaration d'une fonction :
function separation(){ #declaration d'une fonction sans parametre
    ;
}

// Appel de la fonction :
separation(); // on appelle une fonction en ecrivant son nom suivi d'une paire de ();

// ---------
// Fonction avec paramètre et return :
function bonjour($qui) { // $qui apparait ici pour la 1ere fois il permet de recevoir un argument. Il s'agit d'une variable de récéption.Notez que l'on peut mettre plusieur paramétre dans les parenthése séparés par une virgule

    return 'Bonjour' . $qui . '<br>'; //return renvoie le string qui le suit à l'endroit ou est appelé la fonction
    echo'cette ligne ne sera pas exécutée car aprés un return !';
}

echo bonjour('Jhordan'); // si une fonction attend un argument, il faut lui envoyer.
echo bonjour('Noad');

// ----------------------
// Exercice :
function appliqueTva ($nombre) {
    return $nombre * 1.2;
}

// Ecrivez une fonction appliqueTva2 qui calcule un nombre multiplié par un taux donnés lors de l'appel de la fonction.

function appliqueTva2 ($taux,$multipli) { // on peut initialiser par defaut un paramétre dans le cas ou on ne recoit de valeur en argument lors de l'appel de la fonction. On a renommé notre fonction car on ne peut pas déclarer 2 fonction qui porte le même nom.
    return $multipli * $taux;
}
echo appliqueTva2(5,5) . '<br>';


// -------------
// Exercice :
function meteo($saison) {
    echo "Nous sommes en $saison. <br>";
}

meteo('Automne');
meteo('printemps');

// Au sein d'une nouvelle fonction exoMeteo, afficher l'article au ou en selon la saison (en été,en hiver, en automne, au printemps).
function Mmeteo($ssaison) {
    if ($ssaison === 'hiver' || $ssaison === 'été' || $ssaison === 'Automne') {
        echo "Nous sommes en $ssaison. <br>";
    } else {
         echo "Nous sommes au $ssaison. <br>";
    }
}
Mmeteo('été'); //Argument


// Correction
 
 function exoMeteo($saison) {
  if ($saison === 'printemps') {
  $article = 'au';
  } else {
  $article = 'en';
  }
  
  echo"Nous sommes $article $saison <br>";
  }
  
  exoMeteo('été');
  exoMeteo('Printemps');
//  ------------------------------------

// --------------------------
// Variables locales et variables globales:


// de l'espace locale à l'espace global
function jourSemaine() {
    $jour = 'mardi'; // variable locale à la fonction

    return $jour; // returne permet de sortir une valeur de la fonction
}
// echo $jour; erreur car cette variable n'est connu qu'a l'interieur de la function

echo jourSemaine(); // on récupére ici la valeur "mardi" grâce au return qui se situe dans la fonction

echo '<br>';
// De l'espace global à l'espace local: 

$pays = 'France'; // variable globale

function affichePays(){
    global $pays; # le mot clé global permet de récupérer une variable globale au sein de l'espace local de la fonction

    echo $pays; // affiche France
}

affichePays();
echo '<hr>';

// --------------------------------------------
echo '<h2>*** Structure itératives : les boucles ***</h2>';
// --------------------------------------------

// Les boucles sont destinées à répéter des lignes de codes de facon automatique.

// Boucle while: 
    $i = 0; // valeur de départ de la boucle
    while ($i < 3) { // tant que $i est inferieur à 3 nous entrons dans la boucle
        echo "$i "; // affiche 0-----1-----2----
        $i++; // on noublie pas d'incrémenter à chaque tour de boucle pour ne pas avoir une boucke infinie
    }

    // Note : pas de ";" à la fin des structures itératives

    echo '<br>';

    // exercice : à l'aide d'une boucle while vous allez afficher dans un sélecteur les année de 1918 à 2018.
$a = 1918;

echo '<select>';

while ($a < 2019) { //

        // echo "<option>$a</option>"; //
        echo "<option>" . $a . "</option>"; // en mode concaténation
        $a++; //

    }

    echo '</select>';

    #-----------
 echo '<br>';
 echo '<br>';
    #---------------

    $annee = date ('Y') - 100; // date () fournit la date du jour au format indiqué, ici 'Y' pour year sur 4 chiffres
    echo '<select>';
    while ($annee <= date ('Y')) {
        echo '<option>' . $annee . '</option>';
        $annee++;
        # code...
    }
echo '</select>';

   #-----------
 echo '<br>';
 echo '<br>';
    #---------------

// Boucke do while : elle s'execute au moin une fois et il faut mettre unt ";"
// La boucle do while à la particularité de s'executer au moins une fois (correspondant à "do"), puis tant que la condition while est vraie
$j =1;    
do { // execute le code ci dessous si c'est vrai tu regard le While
        echo 'je fais un tour de boucle';

    } while ($j > 10); //la condition renvoie false ici, pourtant la boucle a bien tourne une fois. Attention au ";" apres le while de cette boucle
    //  Exemple d'utilisation ; poser une question à l'internaute une premiere fois  avec le "do", puis tant qu'il n'a pas répondu avec le "while"
   #-----------
 echo '<br>';
 echo '<br>';
    #---------------
    // ---- boucle for est une autre syntaxe de la boucle while.

    for ($i=0; $i < 22; $i++) { // on trouve dans les parenthèse du for : valeur de départ , condition d'entrée dans la boucle; variation de $i (incrémentation ou autre chose)
        echo $i . '<br>'; // affiche 0 à 9  en 10 tours
    }
    // Rappel : si on veut faire varier de 10 en 10, on écrit $i += 10 à la place de $i++

       #-----------
 echo '<br>';
 echo '<br>';
    #---------------


    // Exercice 
    #Afficher 12 Option de 1 à 12 des mois de l'année d'une boucle for
echo '<select>';
for ($mois=0; $mois < 13 ; $mois++) { 
    echo "<option>$mois</option>";
}
echo '</select>';

  #-----------
 echo '<br>';
 echo '<br>';
    #---------------

    // --------
    // Boucle foreach
    #il existe aussi la boucle foreach pour parcourir les arrays et les objets. Nous la verrons dans un prochain chapitre.

    // --------
    // Exercice : afficher avec une boucle for les chiffres de 0 à 9 dans une table HTML.
echo '<table border="1">';
echo '<tr>';
for ($tableau = 0; $tableau < 10; $tableau++) { 
    echo '<td>' . $tableau . '</td>';
} 
echo '</tr>';
echo '</table>';

echo '<br>';

// Exercie faire une boucle for qui affiche 0 à 9 sur la même ligne, répétée sur 10 lignes, dans une table HTML.
echo '<table border="1">';


for ($tableau = 0; $tableau < 10; $tableau++) { 
    echo '<tr>';
    //  echo '<td>' . $tableau . '</td>';
    for ($i=0; $i < 10; $i++) { 
        echo '<td>' . $i . '</td>';
    }
    echo '</tr>';
}

echo '</table>'; // nous avons ici le principe des boucles imbriquées. Quand la 1ere boucle fait 1 tour la boucle en fait 10.

echo '<br>';
echo '<hr>';
echo '<br>';

// --------------------------------------------
echo '<h2>*** ARRAY Les tableaux  ***</h2>';
// --------------------------------------------

// Un tableau, ou array en anglais, est déclarée comme une variable améliorée dans laquelle on stocke une multitude de valeurs.Ces valeurs peuvent être de n'importe quel type. Elles possèdent un indice dont la numérotation par defaut commence à 0.

// Declaration d'un array (méthode 1):
$liste = array('grégoire','nathalie','jhordan','francois','georges');


echo 'Le type de $liste est :' . gettype($liste) . '<br>'; // affiche le type array

//echo $liste; // erreur de type "Array to string conversion" car on ne peut pas afficher directement un array avec un echo


echo'<pre>';
var_dump($liste); // affiche le contenu du tableau plus certaine information comme les types
echo '</pre>'; // pre est une balise HTML quii permet de formater l'affichage du var_dump
echo'<br>';

echo'<pre>';
print_r($liste); // print_r est plus syntheétique que var_dump : il n'affiche pas le type des éléments contenus dans l'array
echo '</pre>';

// Fonction d'affichage avec balise pre:
function debug( $param)
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
    # code...
}
//  Autre méthode de déclaration d'un array :
$tab = ['Bali','Japon','Portugal','Chine'];
$tab[]= 'ThaÏlande'; // les crochet vide permette d'ajouter une valeur à la fin de votre array
debug($tab);

// Afficher "JAPON" à partir de notre tableau $tab
echo $tab[1] . '<br>'; echo '<br>';

// ----------------
// Tableau associatif :
// Un tableau associatif est un tableau dans lequel on choisit le dénomination des indices.

$couleur = array(
    'j' => 'jaune',
    'b' => 'bleu',
    'v' => 'vert',
);
// Pour accéder à un élément du tableau associatif:
    echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] .  ' <br>';
    echo "La seconde couleur de notre tableau est le $couleur[b]  <br>";//affiche bleu. Un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice 

    // Mesurer la taille d'un array :
    echo 'Taille du tableau $couleur : ' . count($couleur) . '<br>';
    echo 'Taille du tableau $couleur : ' . sizeof($couleur) . '<br>'; //count() et sizeof() font la même chose : ils comptent le nombre d'éléments contenus dans l'array indiqué

echo '<hr>';
// --------------------------------------------
echo '<h2>*** Boucle    Foreach ***</h2>';
// --------------------------------------------
// La boucle foreach est un moyen simple de passer en revu un tableau ou un objet. Elle retourne une erreur si vous tentez de l'utiliser sur autre chose.

debug($tab);
foreach ($tab as $valeur) { // le mot clé "as " fait partie de la structure syntaxique de la foreach: il esy obligatoire. $valeur viens parcourir la colone des valeur de l'array .Notez qu'on peut l'appeler comme ont veux: c'est sa place aprés as qui détermine qu'elle parcourt les valeurs.
    echo $valeur . '<br>'; # on affiche succesivement les éléments du tableau à chaque tour de boucle. La foreach s'arrête automatiquement à la fin du tableau.
    
}
 echo '<br>';
foreach ($tab as $indice => $valeur) { // quand il y a 2 variables après "as", la premère parcourt la colonne des indices (quelque soit son nom), et la seconde parcourt la colonne des valeurs (quelqu soit son nom)
echo $indice . ' correspond à ' .$valeur . '<br>';

}

// Exercice écrivez un array associatif avec les indices prenom, nom, email et telphone, et mettez y des informations pour une seule personne.Puis avec une boucle for each affichez les valeurs dans des <p> sauf pour le prenom qui doit être dans un <h3>.

$personne = array(
    'prenom' => 'Kim',
    'nom' => 'sinvry',
    'email' => 'kim.sinvry@gmail.com',
    'telephone' => '06-12-34-56-78',
);
echo '<p>';
foreach ($personne as $parcour => $données) {
 
 if ($parcour === 'prenom') {
     echo '<h3>'. $données . '</h3>';
 } else {
     echo '<p>'. $données . '</p>';
 }
}
echo '<br>';
echo '<hr>';
// --------------------------------------------
echo '<h2>*** Array multidimensionnel ***</h2>';
// --------------------------------------------
// Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau.Chaque tableau represente une dimension.

// Création d'un array multidimensionnel: 
$tab_multi = array(
    0 => array(
        'prenom' => 'Julien', 
        'nom' => 'Dupont', 
        'telephone' => '01-23-45-67-89' 
    ),
    1 => array(
        'prenom' => 'Jho', 
        'nom' => 'Statham', 
        'telephone' => '06-53-55-97-79' 
    ),
    2 => array(
        'prenom' => 'Pierre', 
        'nom' => 'Dulac' 
    ),
);// il est possible de choisir le nom des indices dans cet array multidimensionnel

debug($tab_multi);

// Accéder à la valeur "Julien" dans cet array:
echo $tab_multi[0]['prenom']; // affiche julien.Nous entrons d'abord à l'indice [0] de $tab_multi, pour ensuite aller à l'indice ['prenom'] dans le sous tableau
echo '<br><br>';
echo '<hr>';
// Parcourir le tableau multidimensionnel avec une boucle for :
//  Possible car les indices sont numériques.

for ($i=0; $i < count($tab_multi); $i++) { 
    echo $tab_multi[$i]['prenom'] . '<br>';
}

// Exercice : afficher les 3 prénom avec une boucle foreach.
foreach ($tab_multi as $navigue => $donnee) 
{
        echo '<p>'. $donnee['prenom'] . '</p>';
        // echo '<p>'. $tab_multi[$navigue]['prenom'] . '</p>';
} #Maniere plus simple ci-dessous
foreach ($tab_multi as $value) {
    echo $value['prenom'] . '<br><br>';
}

// Exercice : affichez TOUTES les valeurs de l'array $tab_multi
foreach ($tab_multi as $parcourir => $element) {
    echo $parcourir . $element['prenom'] . $element['nom'] . $element['telephone'] . '<br><br>';
    // if ($tab_multi != 'telephone') {
    //     echo $element['nom'] . $element['prenom'];
    // }
} 

echo '<br><br><hr>';
foreach ($tab_multi as $sous_tableau) {
    foreach ($sous_tableau as $info) { // sous tableau étant lui même un array, on le parcourt aussi avec une foreach
       echo $info . '<br>'; // $info correspond aux valeurs de sous_tableau
    } 
} echo '<br>';

// --------------------------------------------
echo '<h2>*** Inclusion de fichiers ***</h2>';
// --------------------------------------------

echo 'Première inclusion:';
include 'exemple.inc.php'; // le fichier dont le chemin est spécifié est inclus ici.En cas d'erreur lors de l'inclusion du fiocher , include génére une erreur de type Warning est continue l'execution du script.

echo 'Deuxième inclusion :';
include_once 'exemple.inc.php'; # le once vérifie si le fichier à déjà été inclus si c'est le cas il le ré-inclus pas.

echo '<br> Troisième inclusion :';
require 'exemple.inc.php'; //le fichier est "requis" donc obligatiure : en cas d'erreur lors de l'inclusion du fichier, require génère une erreur de type "fatal error" et stoppe l'exécution du script

echo 'Quatrième inclusion :';
require_once 'exemple.inc.php'; // le once vérifie si le fichier a déjà été inclus avant est après.Si c'est le cas, il ne le ré-inclus pas.

// Le "inc" dans le nom du fichier inclus est indicatif pour préciser aux dévloppeurs qu'il s'agit d'un fichier d'iclusion, et donc pas d'une page à part entière. Ce n'est pas obligatoire mais utile.

echo '<br>';

// --------------------------------------------
echo '<h2>*** Inclusion de fichiers ***</h2>';
// --------------------------------------------
// Un objet est un autre type de données.Il représente un objet réel (par exemple : une voiture, un meuble , un personnage,etc....)  auquel on peut associer des caractéristiques appelées propriétés (ou attributs), ainsi que des fonctions pour faire des actions appelées méthodes.
// Pour créer un objet, il nous faut un "plan de construction" : c'est le rôle de la classe.Nous créons ici une classe pour fabriquer des objets meubles :
class Meuble { #On met une majiscule au nom des classes
     public $marque = 'ikea';#$marque est une propriété .Public pour dire qu'elle est accesible ç l'extérieur de la classe
     public function prix(){ # prix() est une méthode
        return rand(50,200); #choisit un entier aléatoirement entre 50 et 200

     }
    
} #cette classe est un "plan de construction" d'objet "meuble" qui pourro,t utiliser la propriété $marque et la méthode prix()

// Pios ,ous cr"eons une table à partir de cette classe :
$table = new Meuble(); #new est un mot clé sui permet d'instancier la classe Meuble pour en faire un objet $table.On dit que $table est une instance de Meuble.

debug($table); #affiche le type object, la classe Meuble dont il vient, et sa propriété $marque

echo 'La marque de ma table est :' . $table->marque . '<br>'; #Pour accéder à la propriété d'un objet , on écrit l'objet suivi d'une flèche "->"suivi du nom de la propriété sans "/$"
echo 'Le prix de ma table est :' . $table->prix() . '€<br>';  //pour accéder à une méthode d'un objet, on écrit l'objet suivi d'une flèche "->" suivi du nom de la méthode avec une paire de ()



// -----------------------FIN DU FICHIER--------------------------
