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
  if (!empty($title_ins) && !empty($type_ins) && !empty($description_ins) && !empty($city_ins)){
    $sql_2='SELECT COUNT(*) AS nb, title
    FROM projects
    WHERE title = "'.$title_ins.'"';
    $result_2 = $bdd->prepare($sql_2);
    $columns_2 = $result_2->execute();
    $columns_2 = $result_2->fetch();
    $nb_2 = intval($columns_2['nb']);
    if ($nb_2 != 1) {
      $result = $bdd->prepare('INSERT INTO projects (title,type,urgency,city,monney,description) Values ("'.$title_ins.'","'.$type_ins.'","'.$urgency_ins.'","'.$city_ins.'","'.$monney_ins.'","'.$description_ins.'")'); 
      $columns = $result->execute();
      $columns = $result->fetch();

      $result = $bdd->prepare('SELECT id FROM projects WHERE title= "'.$title_ins.'" ');
      $res = $result->execute();
      $res = $result->fetch();

      $result2 = $bdd->prepare('SELECT id FROM users WHERE mail= "'.$_SESSION['mail'].'" ');
      $res2 = $result2->execute();
      $res2 = $result2->fetch();

      $result = $bdd->prepare('INSERT INTO projects_users (project_id,user_id,leader,validation) Values ("'.intval($res["id"]).'","'.intval($res2["id"]).'",1,1)'); 
      $columns = $result->execute();
      $columns = $result->fetch(); 
     
      

      return 1;
    }
    else  {
      return 2; 
    }

  }
  else {
    return 3;
  }
}


static function update_project($choixproject ,$title_ins, $type_ins, $urgency_ins, $city_ins, $monney_ins, $description_ins) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (isset($title_ins) && isset($type_ins) && isset($description_ins) && isset($city_ins)){
    $result = $bdd->prepare('UPDATE projects 
      SET title="'.$title_ins.'",type="'.$type_ins.'",urgency="'.$urgency_ins.'",city="'.$city_ins.'",monney="'.$monney_ins.'",description="'.$description_ins.'"
      WHERE id= "'.$choixproject.'" '); 
    $columns = $result->execute();
    $columns = $result->fetch();

  }
}

static function display_project(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  $result2 = $bdd->prepare('SELECT id FROM users WHERE mail= "'.$_SESSION['mail'].'" ');
      $res2 = $result2->execute();
      $res2 = $result2->fetch();
      $_SESSION["id"]=$res2['id'];
  if (!isset($_GET['type'])) {
    $_GET['type']="non_selected";
  }
  if ($_GET['type']=="non_selected") {
   $res= "SELECT * FROM projects WHERE id NOT IN (SELECT project_id FROM projects_users WHERE user_id='".$_SESSION["id"]."' )";

 }
 else{
  $res= "SELECT * FROM projects WHERE type= '".$_GET['type']."' AND id NOT IN(SELECT project_id FROM projects_users WHERE user_id='".$_SESSION["id"]."' )";
}
$prepa=$bdd->prepare($res);
$exec=$prepa->execute(); 
$mes_donnees=$prepa->fetchAll();

return $mes_donnees;    
}

static function display_projectjoined(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (!isset($_GET['validate'])) {$_GET['validate']=0;}
  if ($_GET['validate']==0) {
   $res= "SELECT * FROM projects WHERE id IN (SELECT project_id FROM projects_users WHERE user_id='".$_SESSION["id"]."'AND validation=0 AND leader=0 )";

 }
 else{
  $res= "SELECT * FROM projects WHERE id IN (SELECT project_id FROM projects_users WHERE user_id='".$_SESSION["id"]."'AND validation=1 AND leader=0 )";
}
$prepa=$bdd->prepare($res);
$exec=$prepa->execute(); 
$mes_donnees=$prepa->fetchAll();

return $mes_donnees;    
}

static function display_useradded(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (!isset($_GET['project_id'])) {
   $res= "SELECT * FROM users u INNER JOIN projects_users pu ON u.id=pu.user_id WHERE pu.project_id IN (SELECT p.id FROM projects p INNER JOIN projects_users pu ON p.id=pu.project_id WHERE pu.user_id='".$_SESSION["id"]."' AND leader=1) AND leader=0 AND validation=1";
 }
 else{
   $res="SELECT * FROM users u INNER JOIN projects_users pu ON u.id=pu.user_id WHERE pu.project_id ='".$_GET['project_id']."' AND leader=0 AND validation=1 ";
 }
 $prepa=$bdd->prepare($res);
 $exec=$prepa->execute(); 
 $mes_donnees=$prepa->fetchAll();

 return $mes_donnees;    
}

static function display_demandeprojectjoined(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root',''); 

  $res= "SELECT * FROM users u INNER JOIN projects_users pu ON u.id=pu.user_id WHERE pu.project_id IN (SELECT project_id FROM projects_users WHERE user_id='".$_SESSION["id"]."' AND leader=1 ) AND leader=0 AND validation=0 INNER JOIN projects pro ON pro.id=pu.project_id ";

  $prepa=$bdd->prepare($res);
  $exec=$prepa->execute(); 
  $mes_donnees=$prepa->fetchAll();

  return $mes_donnees;    
}

static function validate_project($project_id ,$user_id) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (isset($project_id) && isset($user_id)){
    $result = $bdd->prepare('UPDATE projects_users SET validation=1 WHERE user_id= "'.$user_id.'" AND project_id="'.$project_id.'" '); 
    $columns = $result->execute();
    $columns = $result->fetch(); 
    return 1;

  }
}


static function display_my_project(){
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  $result2 = $bdd->prepare('SELECT id FROM users WHERE mail= "'.$_SESSION['mail'].'" ');
      $res2 = $result2->execute();
      $res2 = $result2->fetch();
      $_SESSION["id"]=$res2['id'];

  $res= "SELECT * FROM projects p INNER JOIN projects_users pu ON p.id=pu.project_id WHERE pu.user_id='".$_SESSION["id"]."' AND leader=1 ";
  $prepa=$bdd->prepare($res);
  $exec=$prepa->execute(); 
  $mes_donnees=$prepa->fetchAll();
  return $mes_donnees;      
}

static function join_project($id_user, $id_project) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
  if (isset($id_user) && isset($id_project)){
    $result = $bdd->prepare('INSERT INTO projects_users (project_id,user_id,leader,validation) Values ("'.$id_project.'","'.$id_user.'",0,0)'); 
    $columns = $result->execute();
    $columns = $result->fetch();

    return 1;
  }
}

}
?>


