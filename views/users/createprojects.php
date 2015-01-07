
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form class="form-inline text-center" role="form" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label class="sr-only" for="titre">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title">
          </div></br>
          <div class="form-group">Description :</br>
            <label class="sr-only" for="description">Description</label>
            <textarea   id="description" name="description" >
            </textarea>
          </div></br>
          <div class="form-group">Type :
            <label class="sr-only" for="type">Type</label>
            <select name="type">
              <option name="type" value="Mecanique">Mecanique</option>
              <option name="type" value="Informatique">Informatique</option>
              <option name="type" value="Construction">Construction</option>
              <option name="type" value="Immobilier">Immobilier</option>
              <option name="type" value="Sport">Sport</option>
              <option name="type" value="Litteraire">Litteraire</option>
              <option name="type" value="Evenementiel">Evenementiel</option>
              <option name="type" value="Vidéo">Vid&eacute;o</option>
            </select>
          </div></br>
          <div class="form-group">
            <label class="sr-only" for="urgency">Urgency</label>
            <input type="radio" value="1" name="urgency">Urgent
            <input type="radio" value="2" name="urgency">Non Urgent<br>
          </div></br>
          <div class="form-group">
            <label class="sr-only" for="city">City</label>City
            <input type="text" class="form-control" id="city" name="city" placeholder="Paris">
          </div></br>
          <div class="form-group">R&eacute;mun&eacute;ration :
            <label class="sr-only" for="monney">Rémunération</label>
            <select name="monney">
              <option name="monney" value="mecanique">Aucune</option>
              <option name="monney" value="informatique">Envisageable</option>
              <option name="monney" value="construction">R&eacute;mun&eacute;rer</option>
            </select>
          </div></br>
          <input type="hidden" name="id_user_project" value="<?php echo($_SESSION["id"]); ?>">
          <button type="submit" class="btn btn-default">Creer Project</button>
        </form>
        </div>
      </div>
      