 <div class="row">
    <div class="ligne_button">
       <a href="<?php echo $app->urlFor('createproject'); ?>"> <input type="button" class="btn btn-default" value="Create Project"/></a>
   </div>
   <div class="ligne_button">
       <a href="<?php echo $app->urlFor('site'); ?>"> <input type="button" class="btn btn-default" value="All The Projects"/></a>
   </div>
   <div class="ligne_button">
       <a href="<?php echo $app->urlFor('projectjoined'); ?>"> <input type="button" class="btn btn-default" value="Projects Joined"/></a>
   </div>
   <div class="ligne_button">
       <a href="<?php echo $app->urlFor('demandeprojectjoined'); ?>"> <input type="button" class="btn btn-default" value="Add Requests"/></a>
   </div>
   <div class="ligne_button">
       <a href="<?php echo $app->urlFor('userprojectadded'); ?>"> <input type="button" class="btn btn-default" value="Users Added"/></a>
   </div>
</div>

<div class="project_display">

    <div class="form-group">
      <form method="GET" id="form"   >
        <label  for="projet">Projet</label>
        <select name="project_id" id="type" onchange="submit()" >
            <option>Choose one</option>
            <?php foreach ($this->data['projects'] as $projects): ?>
            <option name="project_id" value="<?php echo $projects['id'] ?>"><?php echo $projects['title'] ?></option>
        <?php endforeach; ?> 
    </select>
</form>
</div></br>


<?php foreach ($this->data['users'] as $users): ?>
    <div class="project_div"><div>First-name :
        <?php echo $users['first_name'] ?>
    </div>
    <div>Last-name :
        <?php echo $users['last_name'] ?>
    </div>
    <div>Mail :
        <?php echo $users['mail'] ?>
    </div>
    <div>City :
        <?php echo $users['city'] ?>
    </div>
    <div>Avaibility : 
        <?php echo $users['avaibility'] ?>
    </div>
    <div>furnitures : 
        <?php echo $users['furnitures'] ?>
    </div></div>
    <form method="POST" id="form" action="">
        <input type="hidden" name="demande_project_id" value="<?php echo $users['id'] ?>">
        <input type="submit" value="retirer du projet" name="user_added" class="btn btn-default">
    </form></div></br>
<?php endforeach; ?>

</div>