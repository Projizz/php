<?php
session_start();
include("../connexion_bdd.php");
  // Si on est connecté on est redirigé sur profil
  if(isset($_SESSION['id']) && $_SESSION['id']>0){
    header("location:index.php?section=profil");
    exit;
  //Sinon on passe par le formulaire
  }elseif(isset($_POST['mail']) AND $_POST['mail']!="" AND isset($_POST['pass']) AND $_POST['pass']!="") // On a le nom et le prénom
  {
    
    // On récupère tout le contenu de la table jeux_video
    $req = $bdd->prepare('SELECT * FROM users WHERE mail=:mail AND pass=:pass'); 
    //on passe en paramètre de la requete nos variables $_POST
    $reponse = $req->execute(array(
      'mail' => $_POST['mail'],
      'pass' => $_POST['pass']
      ));
    $donnees = $req->fetch();   
    if($donnees){ 
      foreach ($donnees as $key => $value) {
        $_SESSION[$key]=$value;
      }
      header('location:../../index.php?section=profil');
      exit;
    }else{
      header('location:../../index.php?erreur=inconnu');
      exit;
    }
    $req->closeCursor();
  }
  else // Il manque des paramètres, on avertit le visiteur
  {
    header('location:../../index.php?erreur=form');
    exit;
  }
?>
