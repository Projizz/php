<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="assets/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          
          <div class="page-header">
            <img src="assets/projizz.jpg" alt="projizz" >
<?php if(!empty($_SESSION['mail']) && !empty($_SESSION['utilisateur']) ){ ?>
      
         <a href="<?php echo $app->urlFor('accueil'); ?>"> <img src="assets/deconnexion.png" id="deconnexion" alt="deconnexion" ></a>
        
      <?php } ?>
            <!-- <h1>Projizz <small>Le projet qui jizz</small></h1> -->
          </div>
<?php
if ($flash['error']): ?>
            <p class="alert alert-success">
              <?php echo $flash['error']; ?>
            </p>
          <?php endif ;
if ($flash['success']): ?>
            <p class="alert alert-success">
              <?php echo $flash['success']; ?>
            </p>
          <?php endif ;

            // my view content will be placed here
            echo $yield 
          ?>
        </div>
      </div>
    </div>

  </body>
</html>