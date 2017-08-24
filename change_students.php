<?php
include("include/header.php");
?>

  <?php
    // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

      // Si on a des variables en POST, on tente de modifier la promotion ciblée
      if (isset($_POST["studentname"]) && $_POST["studentname"] != " ") {
        $request = sprintf("UPDATE eleves SET firstname='%s' WHERE id='%s'",
                    $_POST["studentname"], $_POST["id"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Éleve modifié</div>");
        }
        else {
          // Gestion d’erreur SQL
          printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
        }
      }
      if (isset($_POST["studentlastname"]) && $_POST["studentlastname"] != " ") {
        $request = sprintf("UPDATE eleves SET lastname='%s' WHERE id='%s'",
                    $_POST["studentlastname"], $_POST["id"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Éleve modifié</div>");
        }
      }

      if (isset($_POST["promochange"]) && $_POST["promochange"] != " ") {
        $request = sprintf("UPDATE eleves SET promotion_id='%s' WHERE id='%s'",
                    $_POST["promochange"], $_POST["id"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Promotion modifié</div>");
        }
      }
      // On a un id en GET, on sélectionne la promotion et ses informations
      $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
      $result = $connexion->query($request);
      $student = $result->fetch_assoc();
    }
    else {
      // message d’alerte si on n’a pas d’id en paramètre d’URL
      printf("<div class='alert alert-danger'><span class=\"glyphicon glyphicon-warning-sign\"></span> Mode lecture seule,pour modifier un eleve,passez par la <a class=\"error\" href=\"/sample/list_students.php\">liste des eleves.</a></div>");
    }
  ?>
  <h1 class="title">ELEVATOR V2.1.beta</h1>
  <h2 class="title">Modifier un eleve</h2>
    <form method="post" class="form-horizontal">
    <fieldset>

    <!-- Form Name -->
    <legend class="middle"> Pour editer un eleve,remplissez les champs </legend>
    <!-- Text input
    Notez les balises PHP qui permettent l’affichage dynamique -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="studentname">Nom de l'eleve</label>
      <div class="col-md-4">
      <input id="studentname" name="studentname"
      placeholder="Nom de l'eleve" class="form-control input-md"
      required="" value="<?php printf("%s",$student["firstname"]); ?>"
      type="text">
      <span class="help-block">Indiquez ici le nom de l'eleve</span>
      </div>
    </div>

    <!-- Text input
    Notez les balises PHP qui permettent l’affichage dynamique -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="studentlastname">Prénom de l'eleve</label>
      <div class="col-md-4">
      <input id="studentlastname" name="studentlastname"
      placeholder="Prénom de l'eleve" class="form-control input-md"
      required="" value="<?php printf("%s",$student["lastname"]); ?>"
      type="text">
      <span class="help-block">Indiquez ici le prénom de l'eleve</span>
      </div>
    </div>

    <!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="promochange">Promotion</label>
  <div class="col-md-4">
    <select id="promochange" name="promochange" value="<?php printf("%s",$student["promotion_id"]); ?>" class="form-control">
      <option value="1">Phillipe Pary</option>
      <option value="2">Daishi Kaiser</option>
    </select>
  </div>
</div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="validate"></label>
      <div class="col-md-4">
        <input type="hidden" name="id" value="<?php printf("%s", $student["id"]);?>">
        <button id="validate" name="validate" class="btn btn-primary">Valider</button>
      </div>
    </div>

    </fieldset>
    </form>
<?php include("include/footer.php"); ?>
