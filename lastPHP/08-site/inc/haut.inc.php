<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
   
	<title>Ma Boutique</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- La marque -->
       <a class="navbar-brand" href="<?php echo RACINE_SITE . 'boutique.php'; ?>"> MA BOUTIQUE </a>
       
        <!-- Le burger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <!-- Le menu -->
        <div class="collapse navbar-collapse" id="nav1">
        	<ul class="navbar-nav ml-auto">
          <?php
          echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'boutique.php ">Boutique</a></li>';
          // Menu de l'internaute connecté :
          if (internauteEstConnecte()) {
            echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'profil.php ">Profil</a></li>';

            echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'connexion.php?action=deconnexion">Se déconnecter</a></li>';
            # code...
          } else {
            //internaute non connecté:
            echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'inscription.php">Inscription</a></li>';
            echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'connexion.php ">Connexion</a></li>';
          }
          echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'panier.php ">Panier</a></li>';
          // menu de l'administrateur :
          if (internauteEstConnecteEtAdmin()) {
             echo '<li><a class="nav-link" href=" '.RACINE_SITE. 'admin/gestion_boutique.php ">Gestion de la boutique</a></li>';
          }
          
          






				  ?>
        	</ul>
        </div>
      </div>
    </nav>

   
    <!-- Page Content -->
    <div class="container" style="min-height: 80vh;">
      <div class="row">
        <div class="col-12">
        <!--Ici le contenu spécifique de chaque page -->
        
        
















       