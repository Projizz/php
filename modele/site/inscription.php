<?php
session_start();
include("../connexion_bdd.php");
  // Si le formulaire est rempli
  if(isset($_POST['mail']) AND $_POST['mail']!="" AND isset($_POST['pass']) AND $_POST['pass']!="") // On a le nom et le prénom
  {
     
     // On fait l'insertion en base de données
    $req = $bdd->prepare('INSERT INTO users (mail,pass,last_name,first_name) Values (:mail,:pass,:last_name,:first_name)'); 
    //on passe en paramètre de la requete nos variables $_POST
    $reponse = $req->execute(array(
      'mail' => $_POST['mail'],
      'first_name' => $_POST['first_name'],
      'last_name' => $_POST['last_name'],
      'pass' => $_POST['pass']
      ));
    //Récupération de l'id qui vient juste d'être insérée
    $_SESSION['id'] = $bdd->lastInsertId(); 
    if($_POST){ 
      //on transforme toute les variables post en variables session
      foreach ($_POST as $key => $value) {
        $_SESSION[$key]=$value;
      }

    //Gestion de l'avatar
      //vérification que l'upload du fichier c'est bien passé
      if ($_FILES['avatar']['error'] > 0)  header('location:../../index.php?erreur=fichier');
      $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
      //1. strrchr renvoie l'extension avec le point (« . »).
      //2. substr(chaine,1) ignore le premier caractère de chaine.
      //3. strtolower met l'extension en minuscules.
      $extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
      if ( !in_array($extension_upload,$extensions_valides) ) header('location:../../index.php?erreur=fichier');
      // si c'est ok on dit à quel endroit on veut déplacer l'image
      // on lui donne l'ID de l'mailuser + l'extension actuelle du fichier
      $last_name = "../../vue/site/assets/images/{$_SESSION['id']}.{$extension_upload}";
      // on éxécute le déplacement
      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$last_name);

      // on rédirigé vers le profil
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
