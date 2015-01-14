      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form class="form-inline text-center" role="form" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titre">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title">
          </div></br>
          <div class="form-group">
            <label for="description">Description</label></br>
            <textarea   id="description" name="description" >
            </textarea>
          </div></br>
          <div class="form-group">
            <label for="type">Type</label>
            <select name="type">
              <option name="type" value="Mecanique">Mecanic</option>
              <option name="type" value="Informatique">Informatic</option>
              <option name="type" value="Construction">Construction</option>
              <option name="type" value="Immobilier">Immobilier</option>
              <option name="type" value="Sport">Sport</option>
              <option name="type" value="Litteraire">Litteraire</option>
              <option name="type" value="Evenementiel">Evenementiel</option>
              <option name="type" value="Vidéo">Vid&eacute;o</option>
            </select>
          </div></br>
          <div class="form-group">
            <label for="urgency">Urgency</label>
            <input type="radio" value="1" name="urgency">Pressing
            <input type="radio" value="2" checked="checked" name="urgency">No Pressing<br>
          </div></br>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Paris">
          </div></br></br>
          <div class="form-group">
            <label for="monney">Remuneration :</label>
            <select name="monney">
              <option name="monney" value="aucune">Nothing</option>
              <option name="monney" value="envisageable">feasible</option>
              <option name="monney" value="remunerer">Remunerate</option>
            </select>
          </div></br>
          <input type="hidden" name="id_user_project" value="<?php echo($_SESSION["id"]); ?>">
          <button type="submit" class="btn btn-default">Create Project</button>
        </form>
        </div>
      </div>
      