<?php

// nous récupérons le header de la page
  include "page/header.php";
 ?>

<?php
  //nous nous connectons à la base de donnée
  include "db/connectDB.php";
 ?>
 	<!-- Google font -->
 	<link href="https://fonts.googleapis.com/css?family=Poppins:400" rel="stylesheet">

 	<link type="text/css" rel="stylesheet" href="css/css-choix_port/bootstrap.min.css" />

 	<link type="text/css" rel="stylesheet" href="css/css-choix_port/style.css" />


 <body>
 	<div id="booking" class="section">
 		<div class="section-center">
 			<div class="container">
 				<div class="row">
 					<div class="booking-form">

            <?php
            // ici nous récupérons la varible envoyé via l'url
            if (isset($_GET["id"])) {
             $idrecup= $_GET["id"];
           }else{
             $idrecup="";
           }



            // on recupère les elements de la table secteur ou l'id est égal à l'élément que on a envoyé via l'url
           $requete= $conn->query("select * from secteur where id = '$idrecup'");
           while ($resultat = $requete->fetch()) {
             $nom_secteur= $resultat["Nom"];
           }



             ?>

 						<form method="get">
 							<div class="row no-margin">
 								<div class="col-md-3">
                  <div class="form-group">
                    <span class="form-label">Port de Départ</span>
                        <select name="port_depart" class="form-control">
                          <?php

                          //on récupère le nom du secteur et on l'ajoute dans le select celui représente le port de depart
                          $requete= $conn->query("SELECT * FROM `port` where secteur = \"".$nom_secteur."\";");
                          while ($resultat = $requete->fetch()) {
                            $nom_port= $resultat["nom"];
                           ?>
                            <option><?php echo $nom_port; ?></option>
                            <?php

                          }
                            ?>
                  </select>
                    <span class="select-arrow"></span>
                  </div>
 								</div>
                <div class="col-md-3">
                  <div class="form-group">
                    <span class="form-label">Destination</span>
                    <select name="port_arriver" class="form-control">
                      <?php
                        //on récupère le nom du secteur et on l'ajoute dans le select celui représente le port de d'arriver
                      $requete= $conn->query("SELECT * FROM `port` where secteur = \"".$nom_secteur."\" order by nom asc;");
                      while ($resultat = $requete->fetch()) {
                        $nom_port= $resultat["nom"];
                       ?>
                        <option><?php echo $nom_port; ?></option>
                        <?php

                      }
                        ?>
                    </select>
                    <input type="hidden" name="secteur" value="<?php echo $nom_secteur; ?>">
                    <span class="select-arrow"></span>
                  </div>
 								</div>
 								<div class="col-md-6">
 											<div class="form-group">
 												<span class="form-label">Date</span>
                        <!-- On récupère la date à laquel notre client souhaite voyager -->
 												<input name="date" class="form-control" type="date" required>
 											</div>
 								</div>

 								<div class="col-md-12">
 									<div class="form-btn">
 										<button type="submit" class="submit-btn">Rechercher</button>
                    <?php

                        // on vérifie que les variables d'entrer ne possède pas de code php afin de sécurisé le site
                        $depart = htmlspecialchars($_GET["port_depart"]);
                        $arriver = htmlspecialchars($_GET["port_arriver"]);
                        $date = htmlspecialchars($_GET["date"]);
                        $secteur = htmlspecialchars($_GET["secteur"]);

                        // si on récupère nos variables on se dirige sur la page traversee.php avec de nouveau parametre dans l'url
                        if(isset($_GET['port_arriver']) && !empty($_GET['port_arriver'])) {
                              $recherche = htmlspecialchars($_GET['recherche']);
                              echo "<SCRIPT LANGUAGE=\"JavaScript\">document.location.href=\"traversee.php?depart=$depart&arriver=$arriver&date=$date&secteur=$secteur\"</SCRIPT>";
                        }



                     ?>
 									</div>
 								</div>
 							</div>
 						</form>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

 </html>



 <?php
   include "page/footer.php";
  ?>
