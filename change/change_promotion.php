<?php
include("../include/headerpromo.php");
?>
  <?php
    // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

      // Si on a des variables en POST, on tente de modifier la promotion ciblée
      if (isset($_POST["promotionname"]) && $_POST["promotionname"] != " ") {
        $request = sprintf("UPDATE promotions SET name='%s' WHERE id='%s'",
                    $_POST["promotionname"], $_POST["id"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Promotion modifiée</div>");
        }
        else {
          // Gestion d’erreur SQL
          printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
        }
      }

      // On a un id en GET, on sélectionne la promotion et ses informations
      $request = sprintf("SELECT * FROM promotions WHERE id=%s", $_GET["id"]);
      $result = $connexion->query($request);
      $promotion = $result->fetch_assoc();
    }
    else {
      // message d’alerte si on n’a pas d’id en paramètre d’URL
      printf("<div class='alert alert-danger'><span class=\"glyphicon glyphicon-warning-sign\"></span> Mode lecture seule,pour modifier une promotion,passez par la <a class=\"error\" href=\"/sample/list_promotions.php\">liste des promotions.</a></div>");
    }
  ?>
  <h1 class="title">PROMOVATOR V2.1.beta</h1>
  <h2 class="title">Modifier une promotion</h2>
    <form method="post" class="form-horizontal">
    <fieldset>

    <!-- Form Name -->
      <legend class="middle">Pour modifier une promotion,remplissez le champ</legend>

    <!-- Text input
    Notez les balises PHP qui permettent l’affichage dynamique -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="promotionname">Nom de la promotion</label>
      <div class="col-md-4">
      <input id="promotionname" name="promotionname"
      placeholder="Nom de la promotion" class="form-control input-md"
      required="" value="<?php printf("%s",$promotion["name"]); ?>"
      type="text">
      <span class="help-block">Indiquez ici le nom de la promotion</span>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="validate"></label>
      <div class="col-md-4">
        <input type="hidden" name="id" value="<?php printf("%s", $promotion["id"]);?>">
        <button id="validate" name="validate" class="btn btn-primary">Valider</button>
      </div>
    </div>

    </fieldset>
    </form>
<?php include("../include/footer.php"); ?>
