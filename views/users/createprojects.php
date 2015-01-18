      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <form class="form-inline text-center" role="form" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titre">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title">
          </div></br>
          <div class="form-group">
            <label for="description">Description</label></br>
            <textarea id="description" name="description" >
            </textarea>
          </div></br>
          <div class="form-group">
            <label for="type">Type</label>
            <select name="type">
              <option name="type" value="Mechanics">Mechanics</option>
              <option name="type" value="IT">IT</option>
              <option name="type" value="Construction">Construction</option>
              <option name="type" value="Property">Property</option>
              <option name="type" value="Sport">Sport</option>
              <option name="type" value="Literature">Literature</option>
              <option name="type" value="Events">Events</option>
              <option name="type" value="Video">Video</option>
            </select>
          </div></br>
          <div class="form-group">
            <label for="urgency">Emergency</label>
            <input type="radio" value="1" name="urgency">Urgent
            <input type="radio" value="2" checked="checked" name="urgency">Not Urgent<br>
          </div></br>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Paris">
          </div></br></br>
          <div class="form-group">
            <label for="monney">Remuneration :</label>
            <select name="monney">
              <option name="monney" value="Nothing">Nothing</option>
              <option name="monney" value="Feasible">Feasible</option>
              <option name="monney" value="Remunerate">Remunerate</option>
            </select>
          </div></br>
          <input type="hidden" name="id_user_project" value="<?php echo($_SESSION["id"]); ?>">
          <button type="submit" class="btn btn-default">Create Project</button>
        </form>
        </div>
      </div>
      