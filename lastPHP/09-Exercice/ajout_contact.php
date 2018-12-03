<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/



$message= ''; #Variable pour afficher les message d'erreur


//Connexion à la base de données
$pdo = new PDO(
    'mysql:host=localhost;dbname=contacts',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);
// print_r($_POST);


if ($_POST) {
	if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20)
        {  $message .= '<div class="alert alert-danger">Le prénom doit comporter entre 3 et 20 caractères</div>'; } // si n'existe pas l'indice "prenom", c'est que le name correspondant à été modifié... on vérifie aussi la longueur du prenom
			
			if (!isset($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20){  $message .= '<div class="alert alert-danger">Le prénom doit comporter entre 3 et 20 caractères</div>';
			} #fin
			
				if (!isset($_POST['type_contact']) ||  ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre'  ))
					 {$message .= '<div class="alert alert-danger">Le type du contact n\'est pas valide</div>';
					}#fin 

					if (!isset($_POST['telephone']) || strlen($_POST['telephone']) < 3 || strlen($_POST['telephone']) > 10){  $message .= '<div class="alert alert-danger">Le telephone doit comporter entre 3 et 10 caractères</div>';
						#On peut faire aussi if (!isset($_POST['telephone']) || !preg_match('#[0-9]{10}$#',$_POST['telephone'])
			} #fin
						if (!isset($_POST['annee_rencontre']) || !strtotime($_POST['annee_rencontre']))  { $message .= '<p>La date n\'est pas valide .</p>'; //strtotime() renvoie la date false si le trimestamp de la date fournie peut pas être obtenu, autrementdit si la date n'est pas réputée valide
																										}	
							if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ) {
									$message .= '<div class="alert alert-danger">Le telephone doit comporter entre 3 et 10 caractères</div>';
							}										



if (empty($message)) { // Si la variable $message est vide,

                // on échappe toutes les valeurs de $_POST :
                foreach ($_POST as $indice => $valeur) {
					$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
					
				} #Fin du for each
				
				//on prepare la requete sql pour injécter des contact
				$resultat = $pdo->prepare('INSERT INTO contact ( nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES ( :nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact) ');

					#On prepare les variable 
				 $resultat->bindParam(':prenom', $_POST['prenom']);
                    $resultat->bindParam(':nom', $_POST['nom']);
                    $resultat->bindParam(':telephone', $_POST['telephone']);
                    $resultat->bindParam(':email', $_POST['email']);
                    $resultat->bindParam(':annee_rencontre', $_POST['annee_rencontre']);
					$resultat->bindParam(':type_contact', $_POST['type_contact']);
					



				 $succes = $resultat->execute(); #succes 



                    // Message de réussite ou d'échzc de l'enregistrement :
                    if($succes){
                        $message .= '<div class=" alert alert-success"> Le contact à bien été ajouté</div>';
                    } else {
                        $message .= '<div class="alert alert-warning">Erreur lors de L\'enregsitrement </div>';
                    }

			} #fin $message

			





?>
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

<?php echo $message; ?> <!--Pour afficher les message d'erreur à ne pas oublier -->

<form action="" method="post" class="">

<div class="row">
<div class="col-md-12">

<label for="nom">Nom</label> <br> <br>
<input type="text" id="nom" name="nom" value=""> <br> <br>

<label for="prenom">  Prenom</label> <br>
<input type="text" id="prenom" name="prenom" value=""> <br>



<label>Type_contact</label> <br>
<input type="radio" id="type_contact" name="type_contact" value="ami"checked>Ami
<input type="radio" id="type_contact" name="type_contact" value="famille" > famille
<input type="radio" id="type_contact" name="type_contact" value="professionnel" > professionnel
<input type="radio" id="type_contact" name="type_contact" value="autre" > autre
<br>

<label for="service">Telephone</label> <br>
<input type="text" id="telephone" name="telephone" value=""> <br>

<label for="Annee_rencontre">Annee_rencontre</label> <br>
<!-- <input type="text" id="annee_rencontre" name="annee_rencontre" value="" placeholder="dd-mm-YY"> -->
<select name="annee_rencontre" id="annee_rencontre">
<option value="">

<?php 

for ($i = date('Y'); $i >= date('Y')-100; $i--) {

    echo '<option>' . $i . '</option>';


}  ?>

</option>
</select>
 <br>

<label for="Salaire">Email</label> <br>
<input type="email" name="email" id="email"> <br> <br>

<input type="submit" class="btn btn-success" value="enregistrer">

 		</div>
	</div>
</form>




</div>



















	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>


