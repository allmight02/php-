<style>
h3 { color: purple}
</style>
<?php
// -----------------------------------
// Cas pratique : un formulaire pour poster des commentaires
// -----------------------------------
// Objectif : sécuriser le formulaire.
/* Modélisation de la BDD
    BDD : dialogue
    Table : commentaire
    Champs : id_commentaire     INT(3) PK AI
            pseudo              VARCHAR(20)
            message             TEXT
            date enregistrement DATETIME
 */ 







##############################################
//  I.Formulaire de saisie des commentaires :
##############################################


##############################################
//  II.Connexion à la BDD et traitement de $_POST:
##############################################
$pdo = new PDO(
    'mysql:host=localhost;dbname=dialogue',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);
print_r($_POST);
if (!empty($_POST)) {
    #Traitement contre les failles JavaSCRIPT ou CSS : on parle d'échapper les données ou d'échappement :
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
    $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES); //convertit les caractères spéciaux (<,>,&,'',"") en tités HTML inoffensives (par exemple le > devient $gt;).Ainsi les baliss <style> ou <script> saisies dans le formulaire deviennent inopérantes


    // Nous commencons par faire une requête d'insertion qui n'est pas protégée contre les injections et qui n'accepte pas les apostophes :
    // $resultat = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')"); #exemple typique de ce qu'il ne faut pas faire : mettre des entrées utilisateurs (ici $_POST) directement dans la requête

#$resultat = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), 'ok');DELETE FROM commentaire;( #exemple typique de ce qu'il ne faut pas faire : mettre des entrées utilisateurs

    // Nous faison l'injection SQL suivante : ok');DELETE FROM commentaire;(
    #Elle a pour effet de vidr la table commentaire.
    #Pour se prémunir des injections SQL, nous faisons la requête préparée suivante :
    $resultat = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)");
    // $resultat = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (':pseudo, NOW(), ':message)");

    $resultat->bindParam(':pseudo', $_POST['pseudo']);
    $resultat->bindParam(':message', $_POST['message']);

    $resultat->execute();
    //Comment ca marcge ? le fait de mettre des marqeurs dan sla requête permet de na pas concaténer les instuction SQL les rendant directement exécutables.En faisant un bindParam, les instructions SQL sont automatiquement neutralisées par PDO qui les transforme en strings bruts inofffensifs.Ainsi le SGBD attend des valeurs à la place des marqueurs dont il sait qu'elles ne sont pas du code à exécuter.

} //fin du if (!empty($_POST))

?>
<h1>Votre commentaire</h1>
<form action="" method="post">
<label for="pseudo">Pseudo</label> <br>
<input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>"><br>

<label for="message">Commentaire</label> <br>
<textarea name="message" id="message" cols="30" rows="10"> <?php echo $_POST['message'] ?? ""; ?></textarea> <br>
<input type="submit" name="envoi" value="envoyer">

</form>

<?php
##############################################
//  III. Affichage des commentaires
##############################################
$resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d-/m-%Y')
AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");

echo $resultat->rowCount() . 'commentaires postés <br>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<div> Par :' . $commentaire['pseudo'] . 'le' . $commentaire['datefr'] . 'à' . $commentaire['heurefr'] . '</div>';
    echo '<div>' . $commentaire['message'] . '</div><hr>';
    # code...
}