<?php
// On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
$page = $_SERVER['REQUEST_URI'];
$page = str_replace("http://0.0.0.0:8000/sample/", "",$page);

include("../sample/config/db.php");
$connexion = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
      <link href="../bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet"/>
      <link href="/sample/css/bool.css" rel="stylesheet"/>
  <title>PopSchool Simulator 2017</title>
</head>
<body>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">
      <img alt="Brand" src="/sample/include/popschool.png" height="30px" width="30px">
    </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($page == "/sample/home.php"){echo 'class="active"';} ?>><a href="/sample/home.php">Acceuil</a></li>
        <li <?php if($page == "/sample/list_students.php"){echo 'class="active"';} ?>><a href="/sample/list_students.php">Liste des eleves</a></li>
        <li <?php if($page == "/sample/create_students.php"){echo 'class="active"';} ?>><a href="/sample/create_students.php">Creer un eleve</a></li>
        <li <?php if($page == "/sample/change_students.php"){echo 'class="active"';} ?>><a href="/sample/change_students.php">Modifier un eleve</a></li>
        <li <?php if($page == "/sample/delete_students.php"){echo 'class="active"';} ?>><a href="/sample/delete_students.php">Supprimer un eleve</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><button id="validate" name="validate" class="btn btn-danger centerme"><a href="/sample/acceuil.php">Promotions</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
