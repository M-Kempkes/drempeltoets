<?php
session_start();
include_once './Classes/Database.php';
$DB = new Database;
$loginMessage = '';
if(isset($_SESSION['username'])){
    $loginMessage = 'Welcome '.$_SESSION['username'].', Have a wonderful day';
}
elseif($_SERVER['REQUEST_URI'] !== '/drempeltoets/login.php' && $_SERVER['REQUEST_URI'] !== '/drempeltoets/register.php'){
    $loginMessage = 'Currently no user signed in please log in.';
    header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])){
    $DB->logout();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Marco Kempkes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/drempeltoets/main.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

<body>
<nav class="navbar navbar-custom navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="/drempeltoets">Jongeren Kansrijker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/drempeltoets/newactiviteit.php">Nieuwe Activiteit</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/drempeltoets/newjongere.php">Nieuwe Jongere</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/drempeltoets/signup.php">Koppel Activiteit</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/drempeltoets/jongeren.php">Overzicht Jongeren</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/drempeltoets/activiteiten.php">Overzicht Activiteiten</a>
      </li>
    </ul>
    <span class="navbar-text mr-2">
      <?=$loginMessage?>
    </span>
        <?= isset($_SESSION['username']) ? 
        '<form method="post">
            <button type="Submit" class="btn btn-success" name="logout">Log out</button>
        </form>' :
        '<a class="btn btn-success" href="login.php">Log in</a>'?>
  </div>
</nav>
<div class="container">