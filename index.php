<?php
//Autorisation des Sessions
session_start();
//Connexion à la base de données
include_once('modele/connexion_bdd.php');

/*
Tout le site passe par l'index, le changement de pages passe par des variables $_GET['section']
Si il n'y a rien on fait appel au controleur de l'index sinon au controleur correspondant à la 
variable $_GET
*/
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/site/index.php');
}else{
	include_once('controleur/site/'.$_GET['section'].'.php');
}

require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo "Coucou!";
});

$app->get('/foo', function () {
    echo "Foo!";
});
$app->run();
?>