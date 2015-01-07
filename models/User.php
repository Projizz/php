<?php
class User {

    // static function all() {
    //   // fake response of a "SELECT * from books" SQL request
    //   return array(
    //     array(
    //       "id" => 1,
    //       "title" => "Alice au pays des merveilles"
    //     ),
    //     array(
    //       "id" => 2,
    //       "title" => "Tintin au Tibet"
    //     ),
    //     array(
    //       "id" => 3,
    //       "title" => "Le parfum"
    //     )
    //   );
    // }

    // static function getBook($book_id) {
    //   // fake response of a "SELECT * from books WHERE ID = $book_id" SQL request
    //   return array(
    //     "id" => 1,
    //     "title" => "Alice au pays des merveilles",
    //     "description" => "<p>'Perhaps it hasn't one,' Alice ventured to remark.</p><p>'Tut, tut, child!' said the Duchess. 'Everything's got a moral, if only you can find it.' And she squeezed herself up closer to Alice's side as she spoke.</p><p>Alice did not much like keeping so close to her: first, because the Duchess was VERY ugly; and secondly, because she was exactly the right height to rest her chin upon Alice's shoulder, and it was an uncomfortably sharp chin. However, she did not like to be rude, so she bore it as well as she could.</p>",
    //     "author" => "Lewis Caroll",
    //     "remaining" => 3
    //   );
    // }

  private $_mail;
  private $_pass;
  private $_last_name;
  private $_first_name;

  public function __construct($mail, $pass, $last_name, $first_name){
   $this->_mail =$mail;
   $this->_pass = $pass;
   $this->_last_name = $last_name;
   $this->_first_name = $first_name;
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



static function connect_user($mail, $pass) {
  $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');

/*$requet='SELECT mail, pass
        FROM users
        WHERE mail = "'.$_POST['mail'].'"
        AND pass = "'.$_POST['pass'].'"';
    $result = $db->prepare($requet);
    $columns = $result->execute();
    $columns = $result->fetch();*/

    if (isset($_POST["mail"]) && isset($_POST["pass"])){
      if ($_POST['mail']!="" && $_POST['pass']!="") {
        $sql='SELECT COUNT(*) AS nb, id, pass, mail, last_name, first_name, city, avaibility, furnitures
        FROM users
        WHERE mail = "'.$_POST['mail'].'"
        AND pass = "'.$_POST['pass'].'"';
        $result = $bdd->prepare($sql);
        $columns = $result->execute();
        $columns = $result->fetch();
        $nb = $columns['nb'];
        if ($nb == 1) {
          session_start();

          $_SESSION['utilisateur'] = $columns['first_name'].' '.$columns['last_name'];
          $_SESSION['id'] = $columns['id'];
          $_SESSION['city'] = $columns['city'];
          $_SESSION['avaibility'] = $columns['avaibility'];
          $_SESSION['furnitures'] = $columns['furnitures'];
          return true;

        }
      }
    }
    return false;
  }

  static function getUser() {
    return array(
      $_SESSION['utilisateur'],
      $_SESSION['id']

      );
  }



  static function create_user($mail_ins, $pass_ins, $last_name_ins, $first_name_ins) {
    $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
    if (isset($_POST["mail"]) && isset($_POST["pass"])){
      $result = $bdd->prepare('INSERT INTO users (mail,pass,last_name,first_name) Values ("'.$_POST['mail'].'","'.$_POST['pass'].'","'.$_POST['last_name'].'","'.$_POST['first_name'].'")'); 
      $columns = $result->execute();
      $columns = $result->fetch();


      $_SESSION['utilisateur'] = $_POST['first_name'];
      $_SESSION['id'] = $columns['id'];
      $_SESSION['pass'] = $columns['pass'];
      $_SESSION['mail'] = $_POST['mail'];


        //     header('Location: views/users/next.php');
        // exit();
    }
  }


  static function updateUser($city ,$avaibility, $furnitures, $interests) {
    $bdd = new PDO('mysql:host=localhost;dbname=projizz','root','');
    if (isset($_POST["city"]) && isset($_POST["avaibility"]) && isset($_POST["furnitures"]) && isset($_POST["interests"])){
      $sql='UPDATE users 
      SET city="'.$_POST['city'].'",avaibility="'.$_POST['avaibility'].'",interests="'.$_POST['interests'].'",furnitures="'.$_POST['furnitures'].'"
      WHERE first_name = "'.$_SESSION['utilisateur'].'"';
      $result = $bdd->prepare($sql); 

      $columns = $result->execute();
      $columns = $result->fetch();
      var_dump($_SESSION);
      echo $sql;

    }
  }





}
?>


