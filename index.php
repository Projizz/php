<?php
session_start();
  // require composer autoload (load all my libraries)
require 'vendor/autoload.php';

  // require my models
require 'models/User.php';
require 'models/Project.php';

  // Slim initialisation
$app = new \Slim\Slim(array(
    'view' => '\Slim\LayoutView', // I activate slim layout component
    'layout' => 'layouts/main.php' // I define my main layout
    ));

  // hook before.router, now $app is accessible in my views
$app->hook('slim.before.router', function () use ($app) {
  $app->view()->setData('app', $app);
});

  // views initiatilisation
$view = $app->view();
$view->setTemplatesDirectory('views');



$app->get('/', function () use ($app) {
  $app->render(
    'users/accueil.php'
    );
  })->name('accueil'); // named route so I can use with "urlFor" method

//==== AFFICHE PAGE CONNEXION =====
$app->get('/signup', function () use ($app) {
  $app->render(
    'users/signup.php'
    );
})->name('signup'); 
//==== CONNEXION =====
$app->post('/signup', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_user($_POST['mail'], $_POST['pass']);
  if ($isconnected){
    $app->redirect($app->urlFor('projects'));
  }
  else{
    $app->flashNow('error', 'Vous ne remplissez pas les conditions requises');
    $app->render(
      'users/signup.php',
      array("isconnected" => $isconnected)
      ); 
  }
})->name('signup_post');




// ==== AFFICHE TOUT LES PROJET =====
$app->get('/site', function() use ($app) {
  $projects = Project::display_project();
  $app->render( 
    'users/site.php', 
    array( 
      "projects" => $projects
      ) 
    );
})->name('site');
// ==== REJOINDRE PROJET ====
$app->post('/site', function () use ($app) {
  $project = Project::join_project($_POST['id_project'], $_POST['id_user']);
  $projects = Project::display_project();
  if ($project==1){
    $app->flashNow('success', 'Message sent to the owner ! ');
    $app->render(
    'users/site.php',
    array("projects" => $projects)
    );
  }
  else{

    $app->flashNow('error', 'Vous ne remplissez pas les conditions requises');
    $app->render(
    'users/site.php',
    array("projects" => $projects)
    );

  }
  
  
})->name('site_post');


//==== AFFICHE PAGE INSCRIPTION =====
$app->get('/signin', function () use ($app) {
  $app->render(
    'users/signin.php'
    );
})->name('signin'); 
// ====  INSCRIPTION ====
$app->post('/signin', function () use ($app) {
  $user = User::create_user($_POST['mail'], $_POST['pass'],$_POST['last_name'], $_POST['first_name']);
  $app->render(
    'users/signin.php',
    array("user" => $user)
    );
  $app->redirect('./next');
})->name('signin_post');


// ==== AFFICHE PAGE INSCRIPTION SUITE ====
$app->get('/next', function () use ($app) {
  $app->render(
    'users/next.php'
    );
})->name('next'); 
//==== INSCRIPTION SUITE =====
$app->post('/next', function () use ($app) {
  $user = User::updateUser($_POST['city'], $_POST['avaibility'],$_POST['furnitures'], $_POST['interests']);
  $app->render(
    'users/next.php',
    array("user" => $user)
    );
  $app->redirect('./site');
})->name('next_post');


// ==== Affiche projet de l'utilisateur ====
$app->get('/projects', function () use ($app) {
  $projects = Project::display_my_project();
  $app->render(
    'users/projects.php',
    array( 
      "projects" => $projects
      )
    );
})->name('projects'); 


// ==== AFFICHE USER AJOUTE AU PROJET ====
$app->get('/userAdded', function () use ($app) {
  $projects = Project::display_my_project();
  $users = Project::display_useradded();
  $app->render(
    'users/userprojectadded.php',
    array( "projects" => $projects, "users"=> $users)
    );
})->name('userprojectadded');
// ==== SUPPRIME USER DU PROJET ====
$app->post('/userAdded', function () use ($app) {
  $user = Project::delete_user($_POST['user_id']);
  $app->render(
    'users/userprojectadded.php',
    array("user" => $user)
    );
})->name('userprojectadded_post');


// ==== AFFICHE CREER PROJET ====
$app->get('/createproject', function () use ($app) {
  $app->render(
    'users/createprojects.php'
    );
})->name('createproject'); 
// ==== CREER PROJET ====
$app->post('/createproject', function () use ($app) {
    
  $user = Project::create_project($_POST['title'], $_POST['monney'], $_POST['description'], $_POST['type'], $_POST['city'], $_POST['urgency']);
  if ($user == 1){
    $app->flash('success','Your project has been saved');
     $app->render(
    'users/createprojects.php',
    array("user" => $user)
    );
     $app->redirect('./site');
  }
  else{
    if ($user==3){
      $app->flashNow('error','Please complete all the forms');
       $app->render(
    'users/createprojects.php',
    array("user" => $user)
    );
    }
    elseif ($user==2) {
      $app->flashNow('error','Title already used');
      $app->render(
    'users/createprojects.php',
    array("user" => $user)
    );
    }
      
    
  }
  
})->name('createproject_post');

// ==== AFFICHE TOUS LES PROJET REJOINS ====
$app->get('/projectjoined', function() use ($app) {
    // $app->flashNow('success', "C'est très bien !");
  $projects = Project::display_projectjoined();
  $app->render( 
    'users/projectjoined.php', 
    array( 
      "projects" => $projects
      ) 
    );
})->name('projectjoined');


// ==== AFFICHE DEMANDE D'AJOUT AU PROJET ====
$app->get('/demandeprojectjoined', function() use ($app) {
  $projects = Project::display_demandeprojectjoined();
  $app->render( 
    'users/demandeprojectjoined.php', 
    array( 
      "projects" => $projects
      ) 
    );
})->name('demandeprojectjoined');
// ==== VALIDE DEMANDE D'AJOUT AU PROJET
$app->post('/demandeprojectjoined', function () use ($app) {
  $projects = Project::display_demandeprojectjoined();
  $project = Project::validate_project($_POST['demande_project_id'], $_POST['user_id_demande']);
  if ($project == 1){
    $app->flashNow('success','User added to your project !');
  $app->render(
    'users/demandeprojectjoined.php',
    array("projects" => $projects)
    );
}
})->name('demandeprojectjoined_post');





  // always need to be at the bottom of this file !
$app->run();