<?php
include("../include/header.php");

?>
  <h1 class="title">ELEVATOR V2.1.beta</h1>
  <form class="form-horizontal">
    <fieldset>

      <!-- Form Name -->
      <legend class="middle">Liste des eleves</legend>
      <?php if ($result = $connexion->query("SELECT * FROM `eleves")) {
    printf("<legend class=\"title\">");
    printf("Actuellement,il y'a %d eleves.<br/><br/>", $result->num_rows);
    printf("</legend>");} ?>
      <!-- Button (Double) -->
    <?php  if ($result = $connexion->query("SELECT * FROM `eleves` ")) {
         while ($row = $result->fetch_assoc()) {
           printf ('
           <div class="form-group">
             <label class="col-md-4 control-label" for="edit_button"> <p class="text">Éleve n°%s - %s %s</p></label>
             <div class="col-md-8">
             <button id="edit_button" name="edit" class="btn btn-success"><a href="/change/change_students.php?id=%s">Editer</button></a>

              <button id="del_button" name="del" class="btn btn-danger"><a href="/delete/delete_students.php?id=%s">Supprimer</button></a>
             </div>
           </div>
           ',
           $row["id"],
           $row["firstname"],
           $row["lastname"],
           $row["id"],
           $row["id"]
         );
        }
      }
           ?>

    </fieldset>
  </form>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<?php include("../include/footer.php"); ?>
