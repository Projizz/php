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
            <h1>Projizz <small>Le projet qui jizz</small></h1>
          </div>
          <?php 
            // my view content will be placed here
            echo $yield 
          ?>
        </div>
      </div>
    </div>

  </body>
</html>