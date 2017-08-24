<?php
include("include/headerpromo.php");
?>
  <?php
    // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
    if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

      // Si on a des variables en POST, on tente de modifier la promotion ciblée
      if (isset($_POST["deletetable"]) && $_POST["deletetable"] == "CONFIRMER") {
      $request = sprintf("DELETE FROM promotions WHERE id='%s'",
                    $_POST["id"]);
        if($connexion->query($request)) {
            printf("<div class='alert alert-success'>Promotion supprimée</div>");
        }
        else {
          // Gestion d’erreur SQL
          printf("<div class='alert alert-warning'>Erreur: %s </div>", $connection->error);
        }
      }
      elseif (isset($_POST["deletetable"]) && $_POST["deletetable"] != "CONFIRMER") {
         printf("<div class='alert alert-warning'>Erreur: Vous n'avez pas ecrit CONFIRMER </div>");
      }
      // On a un id en GET, on sélectionne la promotion et ses informations
      $request = sprintf("SELECT * FROM promotions WHERE id=%s", $_GET["id"]);
      $result = $connexion->query($request);
      $promotion = $result->fetch_assoc();
    }
    else {
      // message d’alerte si on n’a pas d’id en paramètre d’URL
      printf("<div class='alert alert-danger'><span class=\"glyphicon glyphicon-warning-sign\"></span> Mode lecture seule,pour supprimer une promotion,passez par la <a class=\"error\" href=\"/sample/list_promotions.php\">liste des promotions.</a></div>");

    }
  ?>
  <h1 class="title">ELEVATOR V2.1.beta</h1>
  <h2 class="title">Supprimer une promotion</h2>
<form method="post" class="form-horizontal" id="delete">
<fieldset>

<!-- Form Name -->

  <legend class="middle">Pour supprimer une promotion,remplissez le champ</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="promotionid">Numero de la promotion</label>
    <div class="col-md-1">
      <input id="promotionid" name="promotionid" type="text" value="<?php printf("%s",$promotion["id"]); ?>" readonly="readonly" placeholder="" class="form-control input-md">

    </div>
  </div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="promotionname">Nom de la formation</label>
  <div class="col-md-4">
  <input id="promotionname" name="promotionname" type="text" value="<?php printf("%s",$promotion["name"]); ?>" readonly="readonly" placeholder="" class="form-control input-md">

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
      <input type="hidden" name="id" value="<?php printf("%s", $promotion["id"]);?>">
    <button id="validate" name="validate" class="btn btn-danger">Supprimer</button>
  </div>
</div>

</fieldset>
</form>
<?php include("include/footer.php"); ?>
