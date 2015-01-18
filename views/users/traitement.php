 <?php 
 //test ajax
 $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');

$val = $_REQUEST['categorie'];


 //modif ici
    // requête qui récupère les localités un
    $res = "SELECT * FROM projects WHERE type= 'mecanique' ";
    $prepa=$bdd->prepare($res);
  $exec=$prepa->execute(); 

  $mes_donnees = $prepa->fetch();
  
    // exécution de la requête
/*    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
    // Création de la liste
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
      // je remplis un tableau et mettant l'id en index
      $json[$donnees["title"]][] = utf8_encode($donnees["title"]);
    }*/
 
  
  //On récupère le nom passé en paramètre

  /* 
    ici il vous suffit de faire votre requête
    qui renvoie un tableau

  

  $res= "SELECT * FROM projects WHERE type='".$nom"'";
  $prepa=$bdd->prepare($res);
  $exec=$prepa->execute();
  while ($mes_donnees = $prepa->fetch())*/
  

?>