<?php
  include "page/header.php";

 ?>


	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,600" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/css-reservation/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/css-reservation/style.css" />

  <?php require './db/connectDB.php'; ?>
  <body>
    <div id="booking" class="section">
  		<div class="section-center">
  			<div class="container">
  				<div class="row">
  					<div class="booking-form">
              <div>
                <div class="col-md-4">
  								<div class="form-group">
                    <span class="form-label">Liaison :
                      <?php
                        // affiche lieu de départ et destination avec les données récupérées dans l'url
                        $lieudepart = $_GET["lieudepart"];
                        $destination = $_GET["destination"];
                        echo $lieudepart.' - '.$destination;
                      ?>
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
  								<div class="form-group">
                    <span class="form-label">Traversée n°
                      <?php
                        // affiche num traversée avec les données récupérées dans l'url
                        $numtraversee = $_GET["numtraversee"];
                        echo $numtraversee;
                      ?>
                      le
                      <?php
                        // affiche date avec les données récupérées dans l'url
                        $date = $_GET["date"];
                        echo $date;
                      ?>
                      à
                      <?php
                        // affiche heure avec les données récupérées dans l'url
                        $heure = $_GET["heure"];
                        echo $heure;
                      ?>
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
  								<div class="form-group">
                    <span class="form-label">numéro de reservation :
                      <?php
                        $numreservation = $_GET["numreservation"];
                        echo $numreservation;
                      ?>
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
  								<div class="form-group">
                    <span class="form-label">
                      <?php
                          $sqlinfos = "SELECT nom, adr, cp, ville FROM reservation WHERE num = '$numreservation'";
                          $requete= $conn->query($sqlinfos);

                          // permet d'afficher les données d'une seule et même réservation
                          while ($resultat = $requete->fetch()){
                            $infoNom = $resultat['nom'];
                            $infoAdr = $resultat['adr'];
                            $infoCp = $resultat['cp'];
                            $infoVille = $resultat['ville'];
                          }
                          echo $infoNom.' '.$infoAdr.' '.$infoCp.' '.$infoVille;
                      ?>
                    </span>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-6">
  								<div class="form-group">
                    <table>
                      <tr>
                        <th><span class="form-label">Type</span></th>
                        <th><span class="form-label">Prix unitaire &nbsp &nbsp</span></th>
                        <th><span class="form-label">Quantité</span></th>
                      </tr>

                       <?php


                       $numreservation = $_GET["numreservation"];
                       $date = $_GET["date"];
                       $datetest = new DateTime("$date");
                       $date1= new DateTime("2019-09-02");
                       $date2 = new DateTime("2020-06-22");
                       $date3 = new DateTime("2020-09-21");

                       //permet de gérer le tarif selon les périodes
                       if($date1<=$datetest && $datetest <= $date2){
                         $datetarif = '2019-09-02';
                       }
                       if($date2<$datetest && $datetest < $date3){
                         $datetarif = '2020-06-22';
                       }
                       if($datetest >= $date3){
                         $datetarif = '2020-09-21';
                       }

                       $i =0;
                       $arraytarif = array();
                       $arrayquantite = array();
                       $numtype = array('Adulte', 'Junior 8 à 18 ans', 'enfant de 0 à 7 ans &nbsp &nbsp', 'Voiture long.inf.4m', 'Voiture long.inf.5m', 'Fourgon', 'Camping car', 'Camion');

                       // récupère la quantité et le tarif selon le type de personne
                       $sqldetails = "SELECT quantite from enregistrer where numreservation = $numreservation";
                       $sqltarif = "SELECT tarif from tarifer where codeliaison = '12' and dateDebperiode = '$datetarif'";
                       $requete= $conn->query($sqldetails);
                       $requete2= $conn->query($sqltarif);
                       while (list($resultat) = $requete2->fetch()) {
                         array_push($arraytarif, $resultat);  // ajoute dans un tableau les tarifs selon la traversée selectionné
                       }
                       while (list($resultat) = $requete->fetch()) {
                         array_push($arrayquantite, $resultat); //rajoute dans un tableau les quantités de la même réservation
                       }

                       //affiche les types, quantités, tarifs
                       for ($i = 0; $i<8; $i++){
                         echo " <tr>\n" .
                               "  <td>$numtype[$i]</td>\n" .
                               "  <td> $arraytarif[$i]</td> \n" .
                               "  <td> $arrayquantite[$i]</td>\n" .
                               " </tr>\n";
                       }
                       ?>

                    </table>
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-4">
  								<div class="form-group">
                    <span class="form-label">Total à payer :
                      <?php

                      //permet de calculé la somme des tarifs selon les quantités
                      for ($i = 0; $i<8; $i++){
                        $total += $arrayquantite[$i]*$arraytarif[$i];
                      }
                      echo $total;
                      ?>
                      €
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

<?php
// statistiques du chiffre d'affaires et nombre de passagers

if(isset($total)){
  // chiffre d'affaires
  $chiffre_affaires=$total;

// nombre de passagers transportés par catégorie
$nombre_adulte=$arrayquantite[0];
$nombre_junior=$arrayquantite[1];
$nombre_enfant=$arrayquantite[2];


$sql = "INSERT INTO statistiques (CA, nb_adulte, nb_junior, nb_enfant, date_now) VALUES ($chiffre_affaires, $nombre_adulte, $nombre_junior, $nombre_enfant, CURRENT_DATE())";
$conn->exec($sql);
$conn = null;

}
?>

<?php
  include "page/footer.php";
?>
