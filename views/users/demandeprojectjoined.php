 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script type="text/javascript" src="scripts/fonctions.js"></script>
 <div class="row">
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('projects'); ?>"> <input type="button" class="btn btn-default" value="My Projects"/></a>
        </div>
      </div>

      

          <div id="donnees">
<?php foreach ($this->data['projects'] as $projects): ?>
    <div class="project_div"><div>Mail : 
        <?php echo $projects['mail'] ?>
        </div>
    <div>First-name : 
        <?php echo $projects['first_name'] ?>
      </div>
    <div>Last-name :
        <?php echo $projects['last_name'] ?>
        </div>
    <div>Ville : 
        <?php echo $projects['city'] ?>
        </div>
    <div>Avaibility : 
        <?php echo $projects['avaibility'] ?>
      </div>
    <div>Furnitures : 
        <?php echo $projects['furnitures'] ?>
    </div>
    <div>Interests : 
        <?php echo $projects['interests'] ?>
    </div>
    <form method="POST" id="form" action="">
            <input type="hidden" value="<?php echo $projects['user_id']?>" name="user_id_demande">
            <input type="hidden" name="demande_project_id" value="<?php echo $projects['project_id'] ?>">
            <input type="submit" value="valider" name="valider" class="btn btn-default">
          </form></div></br>
  </br>
  <?php endforeach; ?>
</div>
         