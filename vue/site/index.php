<?php 
//Inclusion de mon header
include("includes/header.php"); 
?>
      <?php 
              //Gestion des erreurs suivant la connexion
              if(isset($_GET["erreur"])){
                switch ($_GET["erreur"]) {
                  case 'inconnu':
                    echo "Erreur d'authentification";
                    break;
                  case 'form':
                    echo "Veuillez remplir tous les champs";
                    break;
                }
              }
            ?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <?php // le formulaire pointe vers le script de connexion ?>
        <form class="form-inline text-center" role="form" method="POST" action="modele/site/connexion.php">
          <div class="form-group">
            
            <label class="sr-only" for="mail">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" placeholder="mail">
          </div>
          <div class="form-group">
            <label class="sr-only" for="pass">PassWord</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form class="form-inline text-center" role="form" method="POST" action="modele/site/inscription.php" enctype="multipart/form-data">
          <div class="form-group">
            <label class="sr-only" for="mail">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" placeholder="mail">
          </div>
          <div class="form-group">
            <label class="sr-only" for="pass">Pass Word</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="sr-only" for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first_name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name">
          </div>
          <div class="form-group">
            <label class="sr-only" for="avatar">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="avatar" placeholder="avatar">
          </div>
          <button type="submit" class="btn btn-default">S'inscrire'</button>
        </form>
        </div>
      </div>
<?php 
//Inclusion du footer
include("includes/footer.php"); 
?>