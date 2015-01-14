 <div class="row">
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('createproject'); ?>"> <input type="button" class="btn btn-default" value="Create Project"/></a>
        </div>
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('site'); ?>"> <input type="button" class="btn btn-default" value="All The Project"/></a>
        </div>
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('projectjoined'); ?>"> <input type="button" class="btn btn-default" value="Project Joined"/></a>
        </div>
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('demandeprojectjoined'); ?>"> <input type="button" class="btn btn-default" value="Add Request"/></a>
        </div>
        <div class="col-md-6 col-md-offset-3">
         <a href="<?php echo $app->urlFor('userprojectadded'); ?>"> <input type="button" class="btn btn-default" value="User Added"/></a>
        </div>
      </div>

 <div class="project_display">

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
     </div></div>
   </br>
  <?php endforeach; ?>

 </div>