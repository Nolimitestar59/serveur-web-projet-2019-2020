<?php
include 'connexion.php';
ini_set('display_errors',off);
session_start();

if(isset($_POST['Search'])){
  $return = '';
  $Recherche = htmlspecialchars($_POST['Search']);
  $result = mysqli_query($connect,'SELECT * from CIS_bdpm Where Nom_Medicament Like "%'.$Recherche.'%" or CODE_CIS Like "%'.$Recherche.'%" or Etat_Commerce Like "%'.$Recherche.'%" or Date_AMM Like "%'.$Recherche.'%"
  ');

  while($row = mysqli_fetch_assoc($result)){
    $tab[] = $row;

  }
  foreach ($tab as $key => $value) {
      $return .= '
      <div class="whole-wrap">
        <div class="container box_1170">
          <div class="section-top-border">
            <h3 class="mb-30"><b>Nom medicament :</b> '.$value["Nom_Medicament"].'</h3>
            <div class="row">
              <div class="col-md-3">
                <p> <b> Code CIS : </b> '.$value["CODE_CIS"].'</p>
                <p> <b> Etat Commercialisation : </b> '.$value["Etat_Commerce"].'</p>
                <p> <b> Date AAM : </b> '.$value["Date_AMM"].'</p>
                <p> <b> Statut Bdm : </b> '.$value["Statut_Bdm"].'</p>
                <p> <b> Titulaire : </b> '.$value["Titulaire"].'</p>
                <p> <b> Sureveillance Renforcée : </b> '.$value["Surveille_Renforce"].'</p>
              </div>
              <div class="col-md-9 mt-sm-20">
                <p><b> Forme Pharmaceutique : </b> '.$value["Forme_Pharma"].'</p>
                <p><b> Voie d administration : </b> '.$value["Voie_Admin"].'</p>
                <p><b> Statut Administration AMM: </b> '.$value["Statut_Admin_AMM"].'</p>
                <p><b> Type Procedure AMM: </b> '.$value["Type_Proced_AMM"].'</p>
                <p><b> Numéro automatique Europe: </b> '.$value["Num_Auto_Europe"].'</p>
                <p> <input type="button" class="infomedicament" id='.$value["CODE_CIS"].' value="Voir infos" /></p>
              </div>
            </div>
          </div>
          </div>';

  }

  $return .= "	<script>
  		 $(document).ready(function(){
  			 $('.infomedicament').on('click',function(event){
  				 var Code_CIS = $(this).attr('id');
  				 console.log(Code_CIS);

  				 $.ajax({
  					 url : 'infomedicament.php',
  					 method : 'POST',
  					 data : {
  						 CodeCis : Code_CIS
  					 },
  					 success : function(data){
  						  location.replace('infomedicament.php');

  					 }
  				 });
  			 });
  		 });
  	</script>";

  echo $return;
}

if (isset($_POST['auteur']) && isset($_POST['titreRapport']) && isset($_POST['contenuRapport']) && isset($_POST['codeDossier'])) {
  $auteur = $_POST['auteur'];
  $titreRapport = $_POST['titreRapport'];
  $contenuRapport = $_POST['contenuRapport'];
  $codeDossier = $_POST['codeDossier'];
  $result = mysqli_query($connect, "INSERT INTO `Rapport` (`Auteur`, `Titre`, `Contenu`, `Code Dossier`) VALUES ('$auteur', '$titreRapport', '$contenuRapport', '$codeDossier'); ");

  echo '<div class="whole-wrap">
    <div class="container box_1170">
      <div class="section-top-border">
        <h3 class="mb-30"><b>Auteur :</b> '.$auteur.'</h3>
        <div class="row">
          <div class="col-md-3">
            <p> <b> Titre du rapport : </b> '.$titreRapport.'</p>
            <p> <b> Contenu : </b> '.$contenuRapport.'</p>
            <p> <b> Code Dossier : </b> '.$codeDossier.'</p>
          </div>
        </div>
      </div>
    </div>
    </div>';
}
/*else {
  echo "error";
}*/



if(isset($_POST['SearchCIS'])){
  $CodeCis = $_POST['SearchCIS'];

  $result = mysqli_query($connect,'SELECT * from CIS_bdpm where CODE_CIS = '.$CodeCis.'' );
  while($row = mysqli_fetch_assoc($result)){
    $tab[] = $row;

  }
  foreach ($tab as $key => $value) {
      $return.= '
      <div class="whole-wrap">
        <div class="container box_1170">
          <div class="section-top-border">
            <h3 class="mb-30"><b>Nom medicament :</b> '.$value["Nom_Medicament"].'</h3>
            <div class="row">
              <div class="col-md-3">
                <p> <b> Code CIS : </b> '.$value["CODE_CIS"].'</p>
                <p> <b> Etat Commercialisation : </b> '.$value["Etat_Commerce"].'</p>
                <p> <b> Date AAM : </b> '.$value["Date_AMM"].'</p>
                <p> <b> Statut Bdm : </b> '.$value["Statut_Bdm"].'</p>
                <p> <b> Titulaire : </b> '.$value["Titulaire"].'</p>
                <p> <b> Sureveillance Renforcée : </b> '.$value["Surveille_Renforce"].'</p>
              </div>
              <div class="col-md-9 mt-sm-20">
                <p><b> Forme Pharmaceutique : </b> '.$value["Forme_Pharma"].'</p>
                <p><b> Voie d administration : </b> '.$value["Voie_Admin"].'</p>
                <p><b> Statut Administration AMM: </b> '.$value["Statut_Admin_AMM"].'</p>
                <p><b> Type Procedure AMM: </b> '.$value["Type_Proced_AMM"].'</p>
                <p><b> Numéro automatique Europe: </b> '.$value["Num_Auto_Europe"].'</p>
              </div>
            </div>
          </div>
          </div>';

  }

  $CIP = mysqli_query($connect,'SELECT * FROM CIS_CIP_bdpm WHERE CODE_CIS = '.$CodeCis.'' );
  while($row = mysqli_fetch_assoc($CIP)){
    $tab2[] = $row;

  }

  foreach ($tab2 as $key => $value) {
    $return.= '
    <div class="whole-wrap">
      <div class="container box_1170">
        <div class="section-top-border">
          <h3 class="mb-30"><b>Informations CIP7 du médicament : </h3>
          <div class="row">
            <div class="col-md-3">
              <p> <b> Code CIP7 :</b> '.$value["CODE_CIP7"].'</p>
              <p> <b> Code CIP13 : </b> '.$value["Code_CIP13"].'</p>
              <p> <b> Date de déclaration de commercialisation : </b> '.$value["Date_Declaration_Commerce"].'</p>
              <p> <b> Taux de remboursements : </b> '.$value["Taux_rembourse"].'</p>
              <p> <b> Indication de droit de remboursement  : </b> '.$value["Indication_droit_rembourse"].'</p>
            </div>
            <div class="col-md-9 mt-sm-20">
              <p><b> Etat de commercialisation : </b> '.$value["Etat_Commerce"].'</p>
              <p><b> Libelle de présenation : </b> '.$value["Libelle_presentation"].'</p>
              <p><b> Agrement collectivitées : </b> '.$value["Agrement_Collect"].'</p>
              <p><b> Prix du médicament en euro : </b> '.$value["Prix_medic_euro"].'</p>
              <p><b> Description : </b> '.$value["Description"].'</p>
            </div>
          </div>
        </div>
        </div>';

  }

  $Compo = mysqli_query($connect, 'SELECT *
  FROM CIS_COMPO_bdmp
  WHERE CODE_CIS = '.$CodeCis.'');
  while($rowCompo = mysqli_fetch_assoc($Compo)){
    $tabCompo[] = $rowCompo;
  }

  foreach ($tabCompo as $key => $value) {
      $return.= '
      <div class="whole-wrap">
        <div class="container box_1170">
          <div class="section-top-border">
            <h3 class="mb-30"><b>Composition du médicament : </h3>
            <div class="row">
              <div class="col-md-3">
                <p><b> Référence de dosage  : </b> '.$value["Ref_Dosage"].'</p>
                <p> <b> Code de la Substance  : </b> '.$value["Code_Substance"].'</p>
                <p> <b> Dénomination de la substance  : </b> '.$value["Denom_Substance"].'</p>
                <p> <b> Dosage de la substance : </b> '.$value["Dosage_Substance"].'</p>

              </div>
              <div class="col-md-9 mt-sm-20">
                <p> <b> désignation élément Pharmaceutique : </b> '.$value["desingation_elem_pharma"].'</p>
                <p><b> nature des composants  : </b> '.$value["Nature_Composant"].'</p>
                <p><b> Numéro de liaison : </b> '.$value["Numero_Liaison"].'</p>

              </div>
            </div>
          </div>
          </div>';
  }

  $CPD = mysqli_query($connect, 'SELECT *
  FROM CIS_COMPO_bdmp
  WHERE CODE_CIS = '.$CodeCis.'');
  while($rowCPD = mysqli_fetch_assoc($CPD)){
    $tabCPD[] = $rowCPD;
  }

  foreach ($tabCPD as $key => $value){
    if($value["condition_prescription"] != ""){

    $return .= '
    <div class="whole-wrap">
      <div class="container box_1170">
        <div class="section-top-border">
          <h3 class="mb-30"><b>Condition de Prescription du Médicament : </h3>
          <div class="row">
            <div class="col-md-3">
              <p><b> Condition de prescription : </b> '.$value["condition_prescription"].'</p>

            </div>
          </div>
        </div>
        </div>

    ';
  }
  else {
    $return.='
    <div class="whole-wrap">
      <div class="container box_1170">
        <div class="section-top-border">
          <h3 class="mb-30"><b>Condition de Prescription du Médicament : </h3>
          <div class="row">
            <div class="col-md-3">
              <p><b> Il n\'y a pas de condition pour ce médicament</p>
            </div>
          </div>
        </div>
        </div>';
      }
  }
  echo $return;
}

if(isset($_POST['DateASMR'])){
  $DateASMR = $_POST['DateASMR'];
  $RequeteGrapheDate = 'SELECT * FROM CIS_HAS_ASMR_bdpm WHERE CONVERT(Date_Avis_Comission_,DATE) = "'.$DateASMR.'"';
  $Retourgraphe = mysqli_query($connect,$RequeteGrapheDate);
  while ($rowGraphe = mysqli_fetch_assoc($Retourgraphe)){
    $tabGrapheDate[] = $rowGraphe;
  };
  echo"<pre>";print_r($tabGrapheDate);echo"</pre>";
  foreach ($tabGrapheDate as $key => $value) {
      
  }

}
