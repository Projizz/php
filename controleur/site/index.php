<?php


//Si on est connecté on se redirige sur la page profil
if(isset($_SESSION['id'])&&$_SESSION['id']>0){
  header('location:index.php?section=profil');
  exit;
}

// On affiche la page (vue)
include_once('vue/site/index.php');

