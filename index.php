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

  // GET /
  // $app->get('/', function() use ($app) {
  //   $books = Book::all();
  //   $root_path = $app->urlFor('root');
  //   $app->render( 
  //     'books/index.php', 
  //     array( 
  //       "books" => $books,
  //       "root_path" => $root_path
  //     ) 
  //   );
  // })->name('root'); // named route so I can use with "urlFor" method

  // GET /books/:book_id
  // $app->get('/books/:book_id', function ($book_id) use ($app) {
  //   $book = Book::getBook($book_id);
  //   $app->render(
  //     'books/show.php', 
  //     array("book" => $book)
  //   );
  // })->name('book'); // named route so I can use with "urlFor" method

 // GET /books/:book_id
$app->get('/', function () use ($app) {
  $app->render(
    'users/accueil.php'
    );
  })->name('accueil'); // named route so I can use with "urlFor" method

//==== CONNEXION =====
$app->get('/signup', function () use ($app) {
  $app->render(
    'users/signup.php'
    );
})->name('signup'); 


$app->post('/signup', function () use ($app) {
    //var_dump($_POST);
  session_destroy();

  $isconnected = User::connect_user($_POST['mail'], $_POST['pass']);

  if ($isconnected){
    $app->redirect($app->urlFor('projects'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
   $app->render(
    'users/signup.php',
    array("isconnected" => $isconnected)
    );
   
 }
})->name('signup_post');




// Affichage de tous les projet
$app->get('/site', function() use ($app) {
    // $app->flashNow('success', "C'est très bien !");
    $projects = Project::display_project();
    $app->render( 
      'users/site.php', 
      array( 
        "projects" => $projects
      ) 
    );
     })->name('site');
// Rejoindre projet
$app->post('/site', function () use ($app) {
  $project = Project::join_project($_POST['id_project'], $_POST['id_user']);
  $app->render(
    'users/site.php',
    array("project" => $project)
    );
  
})->name('site_post');


//==== INSCRIPTION =====
$app->get('/signin', function () use ($app) {
  $app->render(
    'users/signin.php'
    );
})->name('signin'); 

$app->post('/signin', function () use ($app) {

  $user = User::create_user($_POST['mail'], $_POST['pass'],$_POST['last_name'], $_POST['first_name']);
  $app->render(
    'users/signin.php',
    array("user" => $user)
    );
  $app->redirect('./next');
})->name('signin_post');



$app->get('/next', function () use ($app) {
  $app->render(
    'users/next.php'
    );
})->name('next'); 

$app->post('/next', function () use ($app) {
// var_dump($_POST);
  $user = User::updateUser($_POST['city'], $_POST['avaibility'],$_POST['furnitures'], $_POST['interests']);
  $app->render(
    'users/next.php',
    array("user" => $user)
    );
  $app->redirect('./site');
})->name('next_post');

//projet de l'utilisateur
$app->get('/projects', function () use ($app) {
  $projects = Project::display_my_project();
  $app->render(
    'users/projects.php',
    array( 
        "projects" => $projects
      )
    );
})->name('projects'); 


    //var_dump($_POST);
$app->get('/userAdded', function () use ($app) {
  $projects = Project::display_my_project();
  $users = Project::display_useradded();
  $app->render(
    'users/userprojectadded.php',
    array( "projects" => $projects, "users"=> $users)
    );
})->name('userprojectadded');

$app->post('/userAdded', function () use ($app) {
  $user = Project::delete_user($_POST['user_id']);
  $app->render(
    'users/userprojectadded.php',
    array("user" => $user)
    );
})->name('userprojectadded_post');

//creer un projet
$app->get('/createproject', function () use ($app) {
  $app->render(
    'users/createprojects.php'
    );
})->name('createproject'); 


$app->post('/createproject', function () use ($app) {
    //var_dump($_POST);

  $user = Project::create_project($_POST['title'], $_POST['monney'], $_POST['description'], $_POST['type'], $_POST['city'], $_POST['urgency']);
  $app->render(
    'users/createprojects.php',
    array("user" => $user)
    );
  $app->redirect('./site');
})->name('createproject_post');

// Affichage de tous les projet Rejoins
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

$app->get('/demandeprojectjoined', function() use ($app) {
    // $app->flashNow('success', "C'est très bien !");
    $projects = Project::display_demandeprojectjoined();
    $app->render( 
      'users/demandeprojectjoined.php', 
      array( 
        "projects" => $projects
      ) 
    );
     })->name('demandeprojectjoined');

$app->post('/demandeprojectjoined', function () use ($app) {
  $project = Project::validate_project($_POST['demande_project_id'], $_POST['user_id_demande']);
  $app->render(
    'users/demandeprojectjoined.php',
    array("project" => $project)
    );
  $app->redirect($app->urlFor('site'));
})->name('demandeprojectjoined_post');

// ==== ACCUEIL ====

  // $app->get('/site', function () use ($app) {
  //   $user = User::getUser();
  //   $app->render(
  //     'users/site.php'
  //   );
  // })->name('site'); 



  // always need to be at the bottom of this file !
$app->run();