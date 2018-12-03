<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=phoenix',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" media="screen" href="phoenix.css">
        <!-- Lien fontAwesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">

    <title>Phoenix</title>
    <style>
    .carousel-item{
        max-height:80vh;
    }

    </style>
</head>

<body>

<div class="container-fluid">

<div class="container">
    <div class="row">
        <div class="col">

            <ul class="nav fixed-top navbar-light">
                <li class="nav-item">
                    <a class="nav-link active" href="?action=accueil"><i class="fab fa-phoenix-framework"></i>Phoenix</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Choisir une destination</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="">Payer</a>
                </li>
            </ul>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row navbar -->
</div>
<!-- /.container navbar -->
<?php  
if (isset($_GET['action'])) {
    
?>
<div class="row">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/caraibes_martinique_boucaniers.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/maldives.jpg " alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/turkoise.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<!-- /.row caroussel-->


</div>
<!-- /.container-fluid -->
<div class="container mt-3">
    <div class="row">
            <a href="?action=choix" class="btn  btn-outline-info btn-block btn-sm"> Choisir mon séjour tout de suite !  </a>

    </div>
    <!-- /.row btn -->
     
<?php 
} elseif( isset($_GET['action']) && $_GET['action'] == 'choix') { 
// } elseif($_GET['action'] == 'choix' ){ 
    
?>

</div>
<!-- /.container btn-->

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                            <p > kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, card's content.</p>
         <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
        </div>
    </div>
</div>
 <!-- /.col-md-4 -->

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="img/sicile_kamarina.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                    <p class=> kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, d's content.</p>
    <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
            </div>
    </div>                    
</div>
<!-- /.col-md-4 -->

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="img/maldives_fino.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                    <p class= >kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, d's content.</p>
    <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
            </div>
    </div>
</div>
<!-- /.col-md-4 -->

    </div>
    <!-- /.row Card 1 -->

    </div>
    <!-- /.col -->

</div>
<!-- /.row Card-->

<div class="row mt-">
    <div class="col">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/maurice_albion.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class= >kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, d's content.</p>
    <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
        </div>
    </div>
</div>
        <!-- /.col-md-4 -->

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="img/maldives_kani.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"> kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, </p>
    <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
    </div>
</div>            
</div>
<!-- /.col-md-4 -->

<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top mb" src="img/grece_gregolimano.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"> kkd,kcf,dk,ck,dkc,d,kc,dk,ckk,kdk,dk,ccccccck,k,k, </p>
    <a href="?action=reservez" class="btn btn-outline-info btn-block">Reservez maintenant !</a>
    </div>
    </div>
</div>
<!-- /.col-md-4 -->
</div>
<!-- /.row Card 2 -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row Card-->
</div>
<!-- /.container des contenu-->
<?php  
 }
// } elseif ($_GET['action'] == 'reservez'){ 
     
 
 ?>

<div class="row">
    <div id="carouselExampleControls" class="carousel slide "style="height:100%;" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/caraibes_martinique_boucaniers.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/maldives.jpg " alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/turkoise.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<!-- Partie reservation -->
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">Les boucaniers</h2>
                <p class="card-text"></p>
    
            </div>
        </div>
</div>
<div class="col">
    <div class="card">
        <div class="card-header bg-info text-red">
    Je complète mes information de réservation<i class="fab fa-phoenix-framework"></i>
        </div>
  <div class="card-body">
    <form action="" method="post" >
        <div class="row">
            <div class="col-12">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email de confirmation">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Je pars combien de semaines">
            </div>

            <div class="col-6">
                <input type="text" class="form-control" placeholder="Nombre de vacanciers">
            </div>
        </div>

    </form>
    
    <a href="?action=maintenant" class="btn btn-info btn-block mt-3">Reservez maintenant</a>
  </div>
</div>
        </div>
        
    </div><!-- /.row -->
</div> <!-- /.container Partie 2 -->

<div class="container">
    <div class="row">
<div class="col-md-4">
    
    <div class="card" style="width: 18vh;" >
            <img class="card-img-top " src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
        </div>
</div>
<div class="col-md-4">
    <div class="card" style="width: 18vh;">
            <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
        </div>
</div>
<div class="col-md-4">
    <div class="card" style="width: 18vh;">
            <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
        </div>
</div>
</div>
     
</div> <!--MINI IMAGE-->
<!--Partie 3 *********************************************************** -->
<?php 
// } elseif ($_GET['action'] == 'maintenant'){
//     echo '<p>LOLLL</p>';
// }

?>
<div class="container">
<div class="row">


</div><!-- fin row parti3 -->

</div>
<!-- /.container partie 3 -->














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
</body>

</html>