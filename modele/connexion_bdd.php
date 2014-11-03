<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=projizz', 'root', '');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>