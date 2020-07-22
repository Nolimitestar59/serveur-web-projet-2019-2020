<?php
    //delete connexion
  $connect = mysqli_connect($host_name, $user_name, $password, $database);

  /*if (mysqli_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysqli_error().'</p>');
  } else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >';
  }*/

  $requetePage = "SELECT count(*) as total FROM `CIS_bdpm`";
  $NumMedicaments = 50;
  $retour_total= mysqli_query($connect, $requetePage);
  $donnes_total= mysqli_fetch_assoc($retour_total);
  $total=$donnes_total['total'];
  $nombreDePages= ceil($total/$NumMedicaments);


  if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
  {
      $pageActuelle=intval($_GET['page']);

      if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
      {
           $pageActuelle=$nombreDePages;
      }
  }
  else // Sinon
  {
      $pageActuelle=1; // La page actuelle est la n°1
  }

  $premiereEntree=($pageActuelle-1)*$NumMedicaments;

  $CodeCis = 61266250;
  $requete =" SELECT * FROM `CIS_bdpm` Limit ".$premiereEntree." ,".$NumMedicaments."";

  $requeteMed = 'SELECT * from CIS_bdpm where CODE_CIS = '.$CodeCis.'';

  $requeteCip = 'SELECT *
  FROM CIS_CIP_bdpm
  WHERE CODE_CIS = '.$CodeCis.'';

  $requeteCPD = 'SELECT *
  FROM CIS_COMPO_bdmp
  WHERE CODE_CIS = '.$CodeCis.'';

  $requeteGener = 'SELECT *
  FROM CIS_GENER_bdpm
  WHERE CODE_CIS = '.$CodeCis.'';

  $requeteCompo = 'SELECT *
  FROM CIS_COMPO_bdmp
  WHERE CODE_CIS = '.$CodeCis.'';

  $requeteASMR = 'SELECT *
  FROM CIS_HAS_ASMR_bdpm
  WHERE CODE_CIS = '.$CodeCis.'';

  $requeteSMR = 'SELECT *
  FROM CIS_HAS_SMR
  WHERE CODE_CIS = '.$CodeCis.'';

  $RequeteNbCommerce = 'SELECT count(*) as NbCommerce from CIS_bdpm where Etat_Commerce = "Commercialisée" ';
  $RetourNbCommerce = mysqli_query($connect,$RequeteNbCommerce);
  $ValeurNbComemrce = mysqli_fetch_assoc($RetourNbCommerce);
  $NbCommerce = $ValeurNbComemrce['NbCommerce'];

  $RequeteNbCommerceSurveille = 'SELECT count(*) as CommerceSurveille from CIS_bdpm where Etat_Commerce = "Commercialisée" and Surveille_Renforce = "Oui"';
  $RetourSurveille = mysqli_query($connect,$RequeteNbCommerceSurveille);
  $valeurSurveille = mysqli_fetch_assoc($RetourSurveille);
  $CommerceSurveille = $valeurSurveille['CommerceSurveille'];

  $RequeteASMR = 'SELECT count(*) as ASMR from CIS_HAS_ASMR_bdpm where Valeur_ASMR = "V"';
  $RetourASMR = mysqli_query($connect,$RequeteASMR);
  $ValeurASMR = mysqli_fetch_assoc($RetourASMR);
  $ASMR = $ValeurASMR['ASMR'];

  $RequetePrixMoyen = 'SELECT AVG(Prix_medic_euro) as PrixMoyen from CIS_CIP_bdpm';
  $RetourPrix = mysqli_query($connect, $RequetePrixMoyen);
  $ValeurPrix = mysqli_fetch_assoc($RetourPrix);
  $PrixMoyen = $ValeurPrix['PrixMoyen'];

  $requeteRemboursement = 'SELECT AVG(Taux_rembourse) as TauxRemboursement from CIS_CIP_bdpm';
  $RetourTaux = mysqli_query($connect,$requeteRemboursement);
  $valeurTaux = mysqli_fetch_assoc($RetourTaux);
  $TauxRemboursement = $valeurTaux['TauxRemboursement'];

  $RequetePrixMAx = 'SELECT max(Prix_medic_euro) as PrixMax from CIS_CIP_bdpm ';
  $RetourPrixMAx = mysqli_query($connect,$RequetePrixMAx);
  $ValeurMax = mysqli_fetch_assoc($RetourPrixMAx);
  $PrixMax = $ValeurMax['PrixMax'];
/*  $result = mysqli_query($connect,$requete);
  while ($row = mysqli_fetch_assoc($result)) {
    $tab[]=$row;

 }
 foreach ($tab as $key => $value) {
    //echo"<pre>";print_r($tab[$key]);echo"</pre>";
    $return .= 'test'.$key.'<br>';
 }
echo $return;*/
?>
