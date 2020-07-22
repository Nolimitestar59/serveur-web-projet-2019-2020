<?php
  include "page/header.php";
 ?>

  <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
 <!--===============================================================================================-->
 	<link rel="stylesheet" type="text/css" href="css/css-traversee/util.css">
 	<link rel="stylesheet" type="text/css" href="css/css-traversee/main.css">
 <!--===============================================================================================-->
 </head>
 <body>
   <?php
   $test = "";

   // nous nous connectons à la base de données
   include "db/connectDB.php";

   // on vérifie si on a bien récupéré tout les parametres
   if (isset($_GET["depart"]) && !empty($_GET["depart"]) &&  isset($_GET["arriver"]) && !empty($_GET["arriver"]) && isset($_GET["date"]) && !empty($_GET["date"])) {
     $depart = $_GET["depart"];
     $arriver = $_GET["arriver"];
     $date = $_GET["date"];
     $date = date("Y-m-d", strtotime($date));
     $secteur = $_GET["session"];
     // on recupère l'id du port qui à le meme nom que celui dans l'url pour le depart
     $requete3= $conn->query("SELECT id from port where Nom =\"$depart\" LIMIT 1");
     while ($resultat3 = $requete3->fetch()) {
        $codeliaisonun= $resultat3["id"];
              }
 // on recupère l'id du port qui à le meme nom que celui dans l'url pour
    $requete4= $conn->query("SELECT id from port where Nom =\"$arriver\" LIMIT 1");
    while ($resultat4 = $requete4->fetch()) {
        $codeliaisondeux= $resultat4["id"];
              }

    // on fusionne les 2 nombres dans le string
    $codeliaison = $codeliaisonun.$codeliaisondeux;

   }
    ?>

 	<div class="limiter">
 		<div class="container-table100">
 			<div class="wrap-table100">
 				<div class="table100">
 					<table>
 						<thead>
 							<tr class="table100-head">
 								<th class="column1">Date</th>
 								<th class="column2">Heure</th>
 								<th class="column3">Bateau</th>
 								<th class="column4">Lieu de Départ</th>
 								<th class="column6">Destination</th>
 							</tr>
 						</thead>
 						<tbody>
<?php
$i=0;


$requete= $conn->query("SELECT * from traversee where codeliaison =\"$codeliaison\" and date = \"$date\"");
while ($resultat = $requete->fetch()) {
      $numtraversee = $resultat["num"];
    	$heure = $resultat["heure"];

      //on récupère l'heure et on l'a change au format d'affichage que nous souhaitons
      $heure = date('H:i',strtotime($heure));
      $idbateau = $resultat["idbateau"];

      $requete2= $conn->query("SELECT nom from bateau where id =\"$idbateau\"");
      while ($resultat2 = $requete2->fetch()) {
        $nombateau = $resultat2["nom"];
      }

$deplacement = "deplacement".$i."()";
 ?>
              <!-- on affiche tout les traversee existantes dans la base de données qui a pour date la saisie par le client et comme port de depart et d'arriver la saisie duclient   -->
 								<tr onclick="<?php echo $deplacement ?>">
 									<td class="column1"><?php echo $date; ?></td>
 									<td class="column2"><?php echo $heure; ?></td>
 									<td class="column3"><?php echo $nombateau; ?></td>
 									<td class="column4"><?php echo $depart; ?></td>
 									<td class="column6"><?php echo $arriver; ?></td>
 								</tr>

<?php

// si le client clique sur la traversée il sera deplacer sur la page reservation.php avec les éléments de la traversée qu'il a choisi
  echo "  <script>
    function deplacement".$i."() {
      document.location.href=\"reservation?codeliaison=$codeliaison&numtraversee=$numtraversee&date=$date&heure=$heure&lieudepart=$depart&destination=$arriver&nombateau=$nombateau\";
    }
    </script>"
 ?>



<?php
//la variable i permet de créer differente fonction JavaScript pour changer de page
$i++;
  }
 ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>




 <!--===============================================================================================-->
 	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
 <!--===============================================================================================-->
 	<script src="vendor/bootstrap/js/popper.js"></script>
 	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
 <!--===============================================================================================-->
 	<script src="vendor/select2/select2.min.js"></script>
 <!--===============================================================================================-->
 	<script src="js/js-traversee/main.js"></script>

 </body>

<?php
  include "page/footer.php";
 ?>
