<?php
// Ouverture ou création d'une session :
session_start();

echo 'La session est accessible dans tous les scripts du site, comme ici :';
print_r($_SESSION); #On voit les information de la session créer dans la page session.php

// Ce fichier n'a rien à voir avec l'autre, il n'y a pas d'inclusion , il pourrait être dans un autre dossier, s'appeler n'importe comment, les inf os contenues dans la sessions restent accesibles grâce au session_start().