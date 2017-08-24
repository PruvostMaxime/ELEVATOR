<?php
include("include/header.php");
$connexion = new mysqli('localhost', 'root', 'AReHyheenVoury5', 'coursSQL1');

$request = "SELECT * FROM eleves";
$result = $connexion->query($request);

while ($row = $result->fetch_assoc()) {
  printf ('
  <div class="form-group">
    <label class="col-md-4 control-label" for="edit_button"> Éleve n°%s - %s %s</label>
  </div>
  ',
  $row["id"],
  $row["firstname"],
  $row["lastname"]);

}
include("include/footer.php");
?>
