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

<?php foreach ($this->data['projects'] as $projects): ?>
    <div class="project_div"><div>Title :
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
     </div></div>
   </br>
  <?php endforeach; ?>

 </div>