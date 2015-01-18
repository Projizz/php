 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script type="text/javascript" src="scripts/fonctions.js"></script>
 <div class="row">
        <div class="ligne_button">
         <a href="<?php echo $app->urlFor('projects'); ?>"> <input type="button" class="btn btn-default" value="My Projects"/></a>
        </div>
      </div>

        <div class="form-group">
          <form method="GET" id="form"   >
            <label  for="type">Type</label>
            <select name="type" id="type" onchange="submit()" >
              <option name="type" value="non_selected" selected:selected>Select</option>
              <option name="type" value="non_selected" >All</option>
              <option name="type" value="Mechanics">Mechanics</option>
              <option name="type" value="IT">IT</option>
              <option name="type" value="Construction">Construction</option>
              <option name="type" value="Property">Property</option>
              <option name="type" value="Sport">Sport</option>
              <option name="type" value="Literature">Literature</option>
              <option name="type" value="Events">Events</option>
              <option name="type" value="Video">Video</option>
            </select>
          </form>
          </div></br>

          <div id="donnees">

<?php foreach ($this->data['projects'] as $projects): ?>
    <div class="project_div"><div>Titre : 
        <?php echo $projects['title'] ?>
        </div>
    <div>Category : 
        <?php echo $projects['type'] ?>
      </div>
    <div>Urgency :
        <?php echo $projects['urgency'] ?>
        </div>
    <div>City : 
        <?php echo $projects['city'] ?>
        </div>
    <div>Remuneration : 
        <?php echo $projects['monney'] ?>
      </div>
    <div>Description : 
        <?php echo $projects['description'] ?>
    </div>
  <form method="POST" id="form" action="">
            <input type="hidden" value="<?php echo $projects['id']?>" name="id_project">
            <input type="hidden" name="id_user" value="<?php echo($_SESSION["id"]); ?>">
            <input type="submit" value="Join" name="rejoindre" class="btn btn-default">
          </form></div></br>
  <?php endforeach; ?>
</div>
         