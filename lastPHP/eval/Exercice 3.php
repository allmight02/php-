<style>
h2 { color: red}
</style>
<?php 
// ------------------------------
echo '<h2> *** Exercice 3 ***</h2>';
// ----------------------


function executeRequete($requete, $param = array())
{
    if (!empty($param)) { //si j'ai bien recu un array non vide (rempli), je peux faire le foreach dessus pour transformer les caractères spéciaux en entités HTML: 
        
    
    foreach ($param as $indice => $valeur) {
        $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); //pour éviter les injections CSS et JS
        
        }
    }
    //...
    global $pdo; // permet d'avoir accés(à l'interieur e la fonction) a la variable de $pdo définit dan sl'espace globale (à l'exterieur de la fonction) 
    $resultat = $pdo->prepare($requete); // on prépare la requête fournie lors de l'appel de la fonction

     $resultat->execute($param); // on execute en liant les marqueurs aux valeurs qui se trouvent dans l'array $param fourni l'appel de la fonction

    return $resultat; // on retourne l'objet PDOStatement à l'endroit ou la fonction executeRequete est appelée
}

$contenu= '';
#Variable d'affichage

$message= ''; #Variable pour afficher les message d'erreur

#Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=exercice_3',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);

#On va procéder à la validation du formulaire

if ($_POST) {
	if (!isset($_POST['title']) || strlen($_POST['title']) < 5 || strlen($_POST['title']) > 20)
        {  $message .= '<div class="alert alert-danger">Le title doit comporter entre 3 et 20 caractères</div>'; } // si n'existe pas l'indice "title", c'est que le name correspondant à été modifié... on vérifie aussi la longueur du prenom
			
			if (!isset($_POST['actors']) || strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 20){  $message .= '<div class="alert alert-danger">Les actors doit comporter entre 5 et 20 caractères</div>';
			} #fin
			
				if (!isset($_POST['category']) ||  ($_POST['category'] != 'horreur' && $_POST['category'] != 'fantastique' && $_POST['type_contact'] != 'amour' && $_POST['category'] != 'animation'  ))
					 {$message .= '<div class="alert alert-danger">La categorie n\'est pas valide</div>';
					}#fin 

					if (!isset($_POST['language']) || strlen($_POST['language']) < 5 || strlen($_POST['language']) > 10){  $message .= '<div class="alert alert-danger">Le language doit comporter entre 5 et 10 caractères</div>';
						
			} #fin
						if (!isset($_POST['year_of_prod']) || !strtotime($_POST['year_of_prod']))  { $message .= '<div class="alert alert-danger">La date n\'est pas valide .</div>'; //strtotime() renvoie la date false si le trimestamp de la date fournie peut pas être obtenu, autrementdit si la date n'est pas réputée valide
																										}	
									if (!isset($_POST['director']) || strlen($_POST['director']) < 5 || strlen($_POST['director']) > 10){  $message .= '<div class="alert alert-danger">Les director doit comporter entre 5 et 10 caractères</div>';
						
			} #fin				

									if (!isset($_POST['storyline']) || strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) > 25){  $message .= '<div class="alert alert-danger">Le description  doit comporter entre 5 et 25 caractères</div>';
						
			} #fin				

									if (!isset($_POST['video']) || strlen($_POST['video']) < 5 || strlen($_POST['video']) > 100){  $message .= '<div class="alert alert-danger">Le Lien doit comporter entre 5 et 25 caractères</div>';
						
			} #fin				



if (empty($message)) { // Si la variable $message est vide,

                // on échappe toutes les valeurs de $_POST :
                foreach ($_POST as $indice => $valeur) {
					$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
					
				} #Fin du for each
				
				//on prepare la requete sql pour injécter les Film
				$resultat = $pdo->prepare('INSERT INTO movies ( title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES ( :title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');

					#On prepare les variable 
				 $resultat->bindParam(':title', $_POST['title']);
                    $resultat->bindParam(':actors', $_POST['actors']);
                    $resultat->bindParam(':director', $_POST['director']);
                    $resultat->bindParam(':producer', $_POST['producer']);
                    $resultat->bindParam(':year_of_prod', $_POST['year_of_prod']);
					$resultat->bindParam(':language', $_POST['language']);
					$resultat->bindParam(':category', $_POST['category']);
					$resultat->bindParam(':storyline', $_POST['storyline']);
					$resultat->bindParam(':video', $_POST['video']);
                    
                    
               
                    $succes = $resultat->fetch(PDO::FETCH_ASSOC);

                 $resultat->execute(); #succes 
                 



                    // Message de réussite ou d'échzc de l'enregistrement :
                    if($resultat){
                        $message .= '<div class=" alert alert-success"> Le film à bien été ajouté</div>';
                    } else {
                        $message .= '<div class="alert alert-warning">Erreur lors de L\'enregsitrement </div>';
                    }

			} #fin $message
}







?>
<!--On créer le formulaire -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>FORMULAIRE contact</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
	

<div class="container">

 <?php echo  $message; ?> <!--Pour afficher les message d'erreur à ne pas oublier -->

<form action="" method="post" class="">

<div class="row">
<div class="col-md-12">

<label for="title">Title</label> <br> 
<input type="text" id="title" name="title" value=""> <br> <br>

<label for="actors">   The Actors</label> <br>
<input type="text" id="actors" name="actors" value=""> <br> <br>

<label for="director">   Directors </label> <br>
<input type="text" id="director" name="director" value=""> <br>

<label>Categorie</label> <br>
<input type="radio" id="category" name="category" value="horreur"checked>horreur
<input type="radio" id="category" name="category" value="fantastique" > fantastique
<input type="radio" id="category" name="category" value="amour" > amour
<input type="radio" id="category" name="category" value="animation" > animation
<br>


<label for="language">language</label> <br>
<input type="text" id="language" name="language" value=""> <br> <br>

<label for="year_of_prod">Year of prod</label> <br>
 <input type="text" id="year_of_prod "name="year_of_prod" value="" placeholder="dd-mm-YY">  <br>
<select name="deroulant" id="deroulant">
<option value=""> <br> <br>

 <label for="storyline">Storyline</label> 

 <br>
    <textarea name="storyline"id="storyline"  name="storyline" cols="30" row="10"></textarea> <!-- les id et les for sont liés : il permettent de placer le curseur dans l'input qaudn on clique sur le label-->
    <br> <br>

    <label for="video">Video</label> <br> 
<input type="text" id="video" name="video" value=""> <br> <br>


<?php 
// for ($i = date('Y'); $i >= date('Y')-100; $i--) {

//     echo '<option>' . $i . '</option>';


//}
  ?>

</option>
</select>
 <br>


<input type="submit" class="btn btn-success" value="enregistrer">

 		</div>
	</div>
</form>




</div>



















	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>