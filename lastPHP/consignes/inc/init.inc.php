<?php
// fichier de configuration du site

// Connexion à la BDD 
$pdo = new PDO('mysql:host=localhost;dbname=phoenix', //driver mysql (pourrait être oracle, IBM,ODBC...)+ nom du serveur de la BDD + nom de la BDD
                'root', #pseudo de la BDD
                '',#mdp de la BDD
                array(PDO ::ATTR_ERRMODE => PDO::ERRMODE_WARNING, #Pour afficher les messages d'erreur SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8' #définition du jeu de caractères des échanges avec la BDD
            )
);

// Session :
session_start();

// Constante qui contient le chemin du site :
define('RACINE_SITE','/PHP/consignes/'); // Indiquer le dossier dans lequel se situe le site dans "localhost" Permet de créer des chemins absolus utilisés notamment dans le header du site inclus dans différents sous-dossiers : par conséquent les chemins relatifs vers les sources changent selon le sous-dossier, ce qui n'est pas le cas en chemin absolu.

//Variables d'affichage :
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// inclusions du fichier qui contient les fonctions du site :
require_once 'fonctions.inc.php';
