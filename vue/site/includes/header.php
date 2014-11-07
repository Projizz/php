<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    
  </head>

  <body>
    <div class="container">
      <?PHP 
      //Si on est connecté on affiche le menu
      if(isset($_SESSION['id']) && $_SESSION['id']>0 ){
        include("menu.php"); 
      }
       ?>