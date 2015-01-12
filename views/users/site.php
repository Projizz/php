 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script type="text/javascript" src="scripts/fonctions.js"></script>
 <div class="row">
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('projects'); ?>"> <input type="button" class="btn btn-default" value="My Projects"/></a>
        </div>
      </div>

        <div class="form-group">
          <form method="GET" id="form"   >
            <label  for="type">Type</label>
            <select name="type" id="type" onchange="submit()" >
              <option name="type" value="non_selected" selected:selected>Selectionnez</option>
              <option name="type" value="non_selected" >Tous</option>
              <option name="type" value="Mecanique">Mecanique</option>
              <option name="type" value="Informatique">Informatique</option>
              <option name="type" value="Construction">Construction</option>
              <option name="type" value="Immobilier">Immobilier</option>
              <option name="type" value="Sport">Sport</option>
              <option name="type" value="Litteraire">Litteraire</option>
              <option name="type" value="Evenementiel">Evenementiel</option>
              <option name="type" value="Vidéo">Vid&eacute;o</option>
            </select>
          </form>
          </div></br>

          <div id="donnees">
<?php foreach ($this->data['projects'] as $projects): ?>
    <div class="project_div"><div>Titre : 
        <?php echo $projects['title'] ?>
        </div>
    <div>Categorie : 
        <?php echo $projects['type'] ?>
      </div>
    <div>Urgence :
        <?php echo $projects['urgency'] ?>
        </div>
    <div>Ville : 
        <?php echo $projects['city'] ?>
        </div>
    <div>R&eacute;mun&eacute;ration : 
        <?php echo $projects['monney'] ?>
      </div>
    <div>Description : 
        <?php echo $projects['description'] ?>
    </div></div></br>
  <?php endforeach; ?>
</div>
         