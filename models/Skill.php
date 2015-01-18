<?php
class Skill {


  private $_skill;

  public function __construct($skill){
   $this->_skill =$skill;
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

static function add_skill($choixarray) {
     $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
        for ($i=0; $i < count($choixarray) ; $i++) { 
          $val=$choixarray[$i];
          // $result = $bdd->prepare('INSERT INTO skills (skill) VALUES ("'.$val.'")'); 
          // $columns = $result->execute();
          // $columns = $result->fetch();

          $result = $bdd->prepare('SELECT id FROM skills WHERE skill="'.$val.'" ');
          $res = $result->execute();
          $res = $result->fetch();

          $result2 = $bdd->prepare('SELECT id FROM users WHERE mail= "'.$_SESSION['mail'].'" ');
      $res2 = $result2->execute();
      $res2 = $result2->fetch();

          $result = $bdd->prepare('INSERT INTO users_skills (skill_id, user_id) Values ("'.intval($res["id"]).'","'.intval($res2["id"]).'")'); 
          $columns = $result->execute();
          $columns = $result->fetch(); 
        }       
  }

        
  }




?>


