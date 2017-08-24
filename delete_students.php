<?php
include("include/header.php");
?>


  <?php
    // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

      // Si on a des variables en POST, on tente de modifier la promotion ciblée
      if (isset($_POST["deletetable"]) && $_POST["deletetable"] == "CONFIRMER") {
      $request = sprintf("DELETE FROM eleves WHERE firstname='%s'",
                    $_POST["elevesname"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Éleve supprimée</div>");
        }
        else {
          // Gestion d’erreur SQL
          printf("<div class='alert alert-warning'>Erreur: %s </div>", $connection->error);
        }
      }
      elseif (isset($_POST["deletetable"]) && $_POST["deletetable"] != "CONFIRMER") {
         printf("<div class='alert alert-warning'>Erreur: Vous n'avez pas ecrit CONFIRMER , essaye encore !</div>");
      }
      // On a un id en GET, on sélectionne la promotion et ses informations
      $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
      $result = $connexion->query($request);
      $eleves = $result->fetch_assoc();
    }
    else {
      // message d’alerte si on n’a pas d’id en paramètre d’URL
      printf("<div class='alert alert-danger'><span class=\"glyphicon glyphicon-warning-sign\"></span> Mode lecture seule,pour supprimer un eleve,passez par la <a class=\"error\" href=\"/sample/list_students.php\">liste des eleves.</a></div>");

    }
  ?>
  <h1 class="title">ELEVATOR V2.1.beta</h1>
  <h2 class="title">Supprimer un eleve</h2>
<form method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->

<legend class="middle">Pour supprimer un eleve,remplissez les champs</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="elevesid">Numero de l'eleve</label>
  <div class="col-md-1">
    <input id="elevesid" name="elevesid" type="text" value="<?php printf("%s",$eleves["id"]); ?>" readonly="readonly" placeholder="" class="form-control input-md">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="elevesname">Nom de l'eleve</label>
  <div class="col-md-4">
  <input id="elevesname" name="elevesname" type="text" value="<?=$eleves["firstname"]?>" readonly="readonly" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="elevesfirst">Prénom de l'eleve</label>
  <div class="col-md-4">
  <input id="elevesfirst" name="elevesfirst" type="text" value="<?php printf("%s",$eleves["lastname"]); ?>" readonly="readonly" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Prepended text -->
<div class="form-group">
  <label class="col-md-4 control-label" for="deletetable">Confirmer la suppresion</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon glyphicon glyphicon-trash"></span>
      <input id="deletetable" name="deletetable" class="form-control" placeholder="" type="text" required="CONFIRMER">
    </div>
    <p class="help-block">Ecrivez "CONFIRMER" pour supprimer la promotion</p>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="validate"></label>
  <div class="col-md-4">
      <input type="hidden" name="id" value="<?php printf("%s", $eleves["lastname"]);?>">
    <button id="validate" name="validate" class="btn btn-danger">Supprimer</button>
  </div>
</div>

</fieldset>
</form>

<?php include("include/footer.php"); ?>
