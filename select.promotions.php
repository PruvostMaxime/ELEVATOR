<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>

  <?php
  $connexion = new mysqli('localhost', 'root', 'AReHyheenVoury5', 'coursSQL1');
  if ($result = $connexion->query("SELECT * FROM `promotions")) {
    printf("<h1 class=\"title\">");
    printf("Le resultat de la requete contient %d lignes.<br/><br/>", $result->num_rows);
    printf("</h1>");} ?>
      <?php while ($row = $result->fetch_array()) {
        printf("<table class = 'table table-bordered table-hover'>");
       printf("<thead>");
       printf("<tr>");
       printf("<td class = 'col-md-4'> Promotion numéro</td>");
       printf("<td class = 'col-md-4'> Nom </td>");
       printf("<td class = 'col-md-4'> Début </td>");
       printf("<td class = 'col-md-4'> Fin </td>");
       printf("</tr>");
       printf("</thead>");
       printf("<tbody>");


       while ($row = $result->fetch_assoc()) {
         printf("<tr> <td class = 'col-md-4'>%s</td>  <td class = 'col-md-4'>%s</td> <td class = 'col-md-4'>%s</td> <td class = 'col-md-4'>%s</td>\n</tr>",  $row["ID"], $row["name"], $row["startdate"], $row["enddate"]);

       }
     }
     ?>
   </tbody>
 </table>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
