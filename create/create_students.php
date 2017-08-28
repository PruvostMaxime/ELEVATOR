<?php
include("../include/header.php");

?>

  <?php

  // Si on a reçu des paramètres en POST grâce au formulaire
  if(isset($_POST["firstname"]) && $_POST["lastname"] != " ") {
    // On prépare la requête au serveur de base de données
    $request = sprintf("INSERT INTO eleves (id, firstname, lastname) VALUES ('', '%s','%s')",
                $_POST["firstname"],
                $_POST["lastname"]);
    // On execute la requête
    if($connexion->query($request)) {
        // Si on est ici, c’est que ça a marché
        printf("<div class='alert alert-success'>Eleve crée</div>");
    }
    else {
      // Si on est ici, c’est que ça a foiré. Message pour la gestion d’erreur MySQL
      printf("<div class='alert alert-warning'>Erreur: %s</div>", $connexion->error);
    }
  }

  ?>
  <h1 class="title">ELEVATOR V2.1.beta</h1>
  <h2 class="title">Creer un eleve</h2>
  <form method="POST" class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
<legend class="middle">Pour creer un eleve,remplissez les champs</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="firstname">Nom du futur eleve</label>
    <div class="col-md-4">
    <input id="firstname" name="firstname" placeholder="Nom de l'eleve" class="form-control input-md" required="" type="text">
    <span class="help-block">Indiquez ici le nom de l'eleve</span>
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="lastname">Prénom du futur eleve</label>
    <div class="col-md-4">
    <input id="lastname" name="lastname" placeholder="Prénom de l'eleve" class="form-control input-md" required="" type="text">
    <span class="help-block">Indiquez ici le prénom de l'eleve</span>
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
<?php include("../include/footer.php"); ?>
