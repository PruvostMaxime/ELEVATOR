<?php
$connexion = new mysqli('localhost', 'root', 'AReHyheenVoury5', 'coursSQL1');

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($connexion->connect_error) {
    printf("Erreur de connexion a la base de données. <br>Message d'erreur : %s<br>Code d'erreur: %s)"
            . $mysqli->connect_error);
}
else {
printf ('Success,you did it ! ');
}
?>
