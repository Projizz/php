<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo "Coucou!";
});

$app->get('/foo', function () {
    echo "Foo!";
});
$app->run();


session_start();
 
include_once('modele/connexion_bdd.php');


if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/site/index.php');
}
else
{
	include_once('controleur/site/'.$_GET['section'].'.php');
}