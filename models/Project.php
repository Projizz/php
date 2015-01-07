<?php
class Project {


  private $_title;
  private $_type;
  private $_urgency;
  private $_city;
  private $_monney;
  private $_description;

  public function __construct($title, $type, $urgency, $city, $monney, $description){
   $this->_title =$title;
   $this->_type = $type;
   $this->_urgency = $urgency;
   $this->_city = $city;
  $this->_monney = $monney;
  $this->_description = $description;
 }

 public function db_connect() {

   try
   {
    $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
    $bdd->query('SET NAMES utf8');
  }

  catch (Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
  }
}

static function create_project($title_ins, $type_ins, $urgency_ins, $city_ins, $monney_ins, $description_ins) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["description"]) && isset($_POST["city"])){
    $result = $bdd->prepare('INSERT INTO projects (title,type,urgency,city,monney,description) Values ("'.$_POST['title'].'","'.$_POST['type'].'","'.$_POST['urgency'].'","'.$_POST['city'].'","'.$_POST['monney'].'","'.$_POST['description'].'")'); 
    $columns = $result->execute();
    $columns = $result->fetch();
    
    $res= $bdd->prepare('SELECT id FROM projects s WHERE s.title="'.$_POST['title'].'" ');
    $columns = $res->execute();
    $columns = $res->fetch();
    
$result = $bdd->prepare('INSERT INTO projects_users (project_id,user_id,leader) Values ("'.intval($columns["id"]).'","'.$_POST["id_user_project"].'",1)'); 
    $columns = $result->execute();
    $columns = $result->fetch(); 
  }
}


static function update_project($choixproject ,$title_ins, $type_ins, $urgency_ins, $city_ins, $monney_ins, $description_ins) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (isset($_POST["title"]) && isset($_POST["type"]) && isset($_POST["description"]) && isset($_POST["city"])){
    $result = $bdd->prepare('UPDATE projects 
      SET title="'.$_POST['title'].'",type="'.$_POST['type'].'",urgency="'.$_POST['urgency'].'",city="'.$_POST['city'].'",monney="'.$_POST['monney'].'",description="'.$_POST['description'].'"
      WHERE id= "'.$_POST['choixproject'].'" '); 
    $columns = $result->execute();
    $columns = $result->fetch();

  }
}

static function display_project(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  $res= "SELECT * FROM projects";
  $prepa=$bdd->prepare($res);
  $exec=$prepa->execute(); 

  while ($mes_donnees = $prepa->fetch()) {
          echo '<div class="container"><div>Titre : '.$mes_donnees['title'].'</div>';
          echo '<div>Cat&eacute;gorie : '.$mes_donnees['type'].'</div>';
          echo '<div>Urgence : ';if ($mes_donnees['urgency']==1) {echo "urgent";}else{echo "non-urgent";}echo'</div>';
          echo '<div>Ville : '.$mes_donnees['city'].'</div>';
          echo '<div>R&eacute;mun&eacute;ration : '.$mes_donnees['monney'].'</div>';
          echo '<div>Description : '.$mes_donnees['description'].'</div></div></br>';
        }     
}

static function display_my_project(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  $res= "SELECT * FROM projects p INNER JOIN projects_users pu ON p.id=pu.project_id WHERE pu.user_id='".$_SESSION["id"]."' ";
  $prepa=$bdd->prepare($res);
  $exec=$prepa->execute(); 

  while ($mes_donnees = $prepa->fetch()) {
          echo '<div class="container"><div>Titre : '.$mes_donnees['title'].'</div>';
          echo '<div>Cat&eacute;gorie : '.$mes_donnees['type'].'</div>';
          echo '<div>Urgence : ';if ($mes_donnees['urgency']==1) {echo "urgent";}else{echo "non-urgent";}echo'</div>';
          echo '<div>Ville : '.$mes_donnees['city'].'</div>';
          echo '<div>R&eacute;mun&eacute;ration : '.$mes_donnees['monney'].'</div>';
          echo '<div>Description : '.$mes_donnees['description'].'</div></div></br>';
        }     
}

}
?>


