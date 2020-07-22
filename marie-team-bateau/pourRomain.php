<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
  include "page/header.php";
  include "db/connectDB.php";
 ?>


<?php
$requete= $conn->query("select * from secteur where id = '$idrecup'");
while ($resultat = $requete->fetch()) {
  $nom_secteur= $resultat["Nom"];
}
 ?>



 <?php
    include "page/footer.php";
  ?>
  </body>
</html>
