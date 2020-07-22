<?php
  include "element-page/header.php";
  include "bdd/connect.php";
 ?>

<?php

$Code_CIS = $_GET["code_cis"];
echo $Code_CIS;
 $requete= $bdd->query("SELECT * FROM CIS_bdpm where CODE_CIS =".$Code_CIS);
  while ($resultat = $requete->fetch()) {
    $Nom_Medicament = $resultat["Nom_Medicament"];
    $Forme_Pharma = $resultat["Forme_Pharma"];
    $Voie_Admin = $resultat["Voie_Admin"];
    $Statut_Admin_AMM = $resultat["Statut_Admin_AMM"];
    $Type_Proced_AMM = $resultat["Type_Proced_AMM"];
    $Etat_Commerce = $resultat["Etat_Commerce"];
    $Date_AMM = $resultat["Date_AMM"];
    $Titulaire = $resultat["Titulaire"];
    $Surveille_Renforce = $resultat["Surveille_Renforce"];
  }
 ?>



 <div class="hero-wrap" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
   <div class="overlay"></div>
   <div class="container">
     <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
       <div class="col-md-8 ftco-animate text-center">
         <h1 class="mb-4">Votre médicament</h1>
         <p><?php echo $Nom_Medicament; ?></p>
       </div>
     </div>
   </div>
 </div>


     <section class="ftco-services">
       <div class="container">
         <div class="row no-gutters">
           <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true"><span class="mr-3 flaticon-cardiogram"></span> Principal</a>

               <a class="nav-link px-4" id="v-pills-buffet-tab" data-toggle="pill" href="#v-pills-buffet" role="tab" aria-controls="v-pills-buffet" aria-selected="false"><span class="mr-3 flaticon-neurology"></span> Element CIP</a>

               <a class="nav-link px-4" id="v-pills-fitness-tab" data-toggle="pill" href="#v-pills-fitness" role="tab" aria-controls="v-pills-fitness" aria-selected="false"><span class="mr-3 flaticon-stethoscope"></span> Composition</a>

               <a class="nav-link px-4" id="v-pills-reception-tab" data-toggle="pill" href="#v-pills-reception" role="tab" aria-controls="v-pills-reception" aria-selected="false"><span class="mr-3 flaticon-tooth"></span> Génération</a>

               <a class="nav-link px-4" id="v-pills-sea-tab" data-toggle="pill" href="#v-pills-sea" role="tab" aria-controls="v-pills-sea" aria-selected="false"><span class="mr-3 flaticon-vision"></span> Nos ASMR</a>

               <a class="nav-link px-4" id="v-pills-spa-tab" data-toggle="pill" href="#v-pills-spa" role="tab" aria-controls="v-pills-spa" aria-selected="false"><span class="mr-3 flaticon-ambulance"></span> CIS + Information importante</a>
             </div>
           </div>
           <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">

             <div class="tab-content pl-md-5" id="v-pills-tabContent">

               <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                 <span class="icon mb-3 d-block flaticon-cardiogram"></span>
                 <h2 class="mb-4">Les éléments principaux de votre médicament</h2>
                 <p>Forme Pharmaceutique : <?php echo $Forme_Pharma; ?></p>
                 <p>Voie d'administration : <?php echo $Voie_Admin; ?></p>
                 <p>Statut d'administration sur la mise sur le marché : <?php echo $Statut_Admin_AMM; ?> </p>
                 <p>Type de procédure de la mise sur le marché : <?php echo $Type_Proced_AMM; ?></p>
                 <p>Etat commercial : <?php echo $Etat_Commerce; ?></p>
                 <p>Date de la mise sur le marché : <?php echo $Date_AMM; ?></p>
                 <p>Titulaire :<?php echo $Titulaire; ?></p>
                 <p>Surveillance renforcé : <?php echo $Titulaire; ?></p>

               </div>

               <div class="tab-pane fade py-5" id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
                 <span class="icon mb-3 d-block flaticon-neurology"></span>
<?php $requete2= $bdd->query("SELECT * FROM CIS_CIP_bdpm where CODE_CIS =".$Code_CIS);
 while ($resultat2 = $requete2->fetch()) {

$CODE_CIP7 = $resultat2["CODE_CIP7"];
$Libelle_presentation = $resultat2["Libelle_presentation"];
$Statut_Admin_Present = $resultat2["Statut_Admin_Present"];
$Etat_Commerce = $resultat2["Etat_Commerce"];
$Date_Declaration_Commerce = $resultat2["Date_Declaration_Commerce"];
$Code_CIP13 = $resultat2["Code_CIP13"];
$Agrement_Collect = $resultat2["Agrement_Collect"];
$Taux_rembourse = $resultat2["Taux_rembourse"];
$Prix_medic_euro = $resultat2["Prix_medic_euro"];
$Indication_droit_rembourse = $resultat2["Indication_droit_rembourse"];

 } ?>

                 <h2 class="mb-4">Eléments du code Identifiant de Présentation</h2>
                 <p>Code CIP7 : <?php echo $CODE_CIP7; ?></p>
                 <p>Libellé présentation du médicament : <?php echo $Libelle_presentation; ?></p>
                 <p>Statut d'administration du médicament : <?php echo $Statut_Admin_Present; ?></p>
                 <p>Etat Commercial : <?php echo $Etat_Commerce; ?></p>
                 <p>Date de la déclaration du médicament : <?php echo $Date_Declaration_Commerce; ?></p>
                 <p>Code CIP13 : <?php echo $Code_CIP13; ?></p>
                 <p>Agrement Collecter : <?php echo $Agrement_Collect; ?></p>
                 <p>Taux de remboursement : <?php if (empty($Taux_rembourse) && !isset($Taux_rembourse)) {
                   echo "0%";
                 } else {
                   echo $Taux_rembourse;
                 } ?></p>

                 <p>Prix du médicament en Euro : <?php echo $Prix_medic_euro; ?></p>
                 <p>Indication du droit de remboursement : <?php echo $Indication_droit_rembourse; ?></p>


               </div>

               <div class="tab-pane fade py-5" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                 <span class="icon mb-3 d-block flaticon-stethoscope"></span>
                 <?php
                 $requete3= $bdd->query("SELECT * FROM CIS_COMPO_bdmp where Code_CIS =".$Code_CIS);
                  while ($resultat3 = $requete3->fetch()) {
                    $desingation_elem_pharma = $resultat3["desingation_elem_pharma"];
                    $Code_Substance = $resultat3["Code_Substance"];
                    $Denom_Substance = $resultat3["Denom_Substance"];
                    $Dosage_Substance = $resultat3["Dosage_Substance"];
                    $Ref_Dosage = $resultat3["Ref_Dosage"];
                    $Nature_Composant = $resultat3["Nature_Composant"];
                  }

                  $requete4= $bdd->query("SELECT * FROM CIS_CPD_bdpm where Code_CIS =".$Code_CIS);
                   while ($resultat4 = $requete4->fetch()) {
                     $condition_prescription = $resultat4["condition_prescription"];
                   }

                  ?>
                 <h2 class="mb-4">Composition du médicament</h2>
                 <p>Désignation de l'élément Pharmaceutique : <?php echo $desingation_elem_pharma; ?></p>
                 <p>Code Substance : <?php echo $Code_Substance; ?></p>
                 <p>Dénomination de la Substance : <?php echo $Denom_Substance; ?></p>
                 <p>Dosage de la Substance : <?php echo $Dosage_Substance; ?></p>
                 <p>Référence du dosage : <?php echo $Ref_Dosage; ?></p>
                 <p>Nature du composant : <?php echo $Nature_Composant; ?></p>
                 <p>Condition de prescription : <?php if (!isset($condition_prescription) && empty($condition_prescription)) {
                   echo "Condition de prescription non fourni";
                 } else {
                   echo $condition_prescription;
                 } ?></p>
               </div>

               <div class="tab-pane fade py-5" id="v-pills-reception" role="tabpanel" aria-labelledby="v-pills-reception-tab">
                 <span class="icon mb-3 d-block flaticon-tooth"></span>
                 <?php
                 $requete5= $bdd->query("SELECT * FROM `CIS_GENER_bdpm` where Code_Cis =".$Code_CIS);
                  while ($resultat5 = $requete5->fetch()) {
                    $id_Group_Gene = $resultat5["id_Group_Gene"];
                    $Libelle_Group_Gene = $resultat5["Libelle_Group_Gene"];
                    $Type_Gene = $resultat5["Type_Gene"];
                    $Num_Trie = $resultat5["Num_Trie"];
                  }

                  ?>
                 <h2 class="mb-4">Génération du médicament</h2>
                 <p> Libelle du groupe qui génére le médicament : <?php if (!isset($Libelle_Group_Gene) && empty($Libelle_Group_Gene)) {
                   echo "Nom défini";
                 } else {
                    echo $Libelle_Group_Gene;
                 } ?></p>
                 <p>Type de Génération : <?php if (!isset($Type_Gene) && empty($Type_Gene)) {
                   echo "Nom défini";
                 } else {
                    echo $Type_Gene;
                 } ?></p>
                 <p>Numéro de trie : <?php if (!isset($Num_Trie) && empty($Num_Trie)) {
                   echo "Nom défini";
                 } else {
                    echo $Num_Trie;
                 } ?></p>

               </div>

               <div class="tab-pane fade py-5" id="v-pills-sea" role="tabpanel" aria-labelledby="v-pills-sea-tab">
                 <span class="icon mb-3 d-block flaticon-vision"></span>
                 <?php
                 $requete6= $bdd->query("SELECT * FROM `CIS_HAS_ASMR_bdpm` where Code_CIS =".$Code_CIS);
                  while ($resultat6 = $requete6->fetch()) {
                     $Code_Dossier_HAS = $resultat6["Code_Dossier_HAS"];
                     $Motif_Eval = $resultat6["Motif_Eval"];
                     $Date_Avis_Comission_	= $resultat6["Date_Avis_Comission_	"];
                     $Valeur_ASMR = $resultat6["Valeur_ASMR"];
                     $Libelle_ASMR = $resultat6["Libelle_ASMR"];
                  } ?>
                 <h2 class="mb-4">Nos Amélioration du service médical rendu (ASMR)</h2>
                 <p>Code du dossier : <?php if (!isset($Code_Dossier_HAS) && empty($Code_Dossier_HAS)) {
                   echo "valeur non défini";
                 } else {
                   echo $Code_Dossier_HAS;
                 } ?></p>
                 <p>Modif de l'évaluation : <?php if (!isset($Motif_Eval) && empty($Motif_Eval)) {
                   echo "valeur non défini";
                 } else {
                   echo $Motif_Eval;
                 } ?></p>
                 <p>Date de l'avis de la Comission : <?php if (!isset($Date_Avis_Comission_) && empty($Date_Avis_Comission_)) {
                   echo "valeur non défini";
                 } else {
                   echo $Date_Avis_Comission_;
                 } ?></p>
                 <p>Valeur de l'Amélioration du service médical : <?php if (!isset($Valeur_ASMR) && empty($Valeur_ASMR)) {
                   echo "valeur non défini";
                 } else {
                   echo $Valeur_ASMR;
                 } ?></p>
                 <p>Libellé de l'Amélioration du service médical : <br> <?php if (!isset($Libelle_ASMR) && empty($Libelle_ASMR)) {
                   echo "valeur non défini";
                 } else {
                   echo $Libelle_ASMR;
                 } ?></p>
               </div>

               <div class="tab-pane fade py-5" id="v-pills-spa" role="tabpanel" aria-labelledby="v-pills-spa-tab">
                 <span class="icon mb-3 d-block flaticon-ambulance"></span>
                 <h2 class="mb-4">Service Médical Rendu (SMR) + Information Importante</h2>
                 <?php
                 $requete7= $bdd->query("SELECT * FROM `CIS_HAS_SMR` where CODE_CIS =".$Code_CIS);
                  while ($resultat7 = $requete7->fetch()) {
                    $CODE_Dossier = $resultat7["CODE_Dossier"];
                    $Motif_Eval = $resultat7["Motif_Eval"];
                    $Date_Avis_Comis_transp	= $resultat7["Date_Avis_Comis_transp	"];
                    $Valeur_SMR = $resultat7["Valeur_SMR"];
                    $Libelle_SMR = $resultat7["Libelle_SMR"];

                  } ?>

                  <p>Code du dossier : <?php if (!isset($CODE_Dossier) && empty($CODE_Dossier)) {
                    echo "Valeur non défini";
                  } else {
                    echo $CODE_Dossier;
                  } ?></p>
                  <p>Motif de l'évaluation : <?php if (!isset($Motif_Eval) && empty($Motif_Eval)) {
                    echo "Valeur non défini";
                  } else {
                    echo $Motif_Eval;
                  } ?></p>
                  <p>Date de l'avis de la Comission des transports : <?php if (!isset($Date_Avis_Comis_transp) && empty($Date_Avis_Comis_transp)) {
                    echo "Valeur non défini";
                  } else {
                    echo $Date_Avis_Comis_transp;
                  } ?></p>
                  <p>Valeur SMR : <?php if (!isset($Valeur_SMR) && empty($Valeur_SMR)) {
                    echo "Valeur non défini";
                  } else {
                    echo $Valeur_SMR;
                  } ?></p>
                  <p>Libellé SMR : <?php if (!isset($Libelle_SMR) && empty($Libelle_SMR)) {
                    echo "Valeur non défini";
                  } else {
                    echo $Libelle_SMR;
                  } ?></p>

                  <?php
                  $requete8= $bdd->query("SELECT * FROM `CIS_Info_Important_bdpm` where Code_CIS =".$Code_CIS);
                   while ($resultat8 = $requete8->fetch()) {
                     $Date_Debut_Info_Secure = $resultat8["Date_Debut_Info_Secure"];
                     $Date_Fin_Info_Secure = $resultat8["Date_Fin_Info_Secure"];
                     $Text_Afficher_Lien_Info_Secure = $resultat8["Text_Afficher_Lien_Info_Secure"];
}

$requete9= $bdd->query("SELECT * FROM `HAS_LiensPageCT_bdmp` where Code_Dossier_HAS =\"".$CODE_Dossier."\"");
 while ($resultat9 = $requete9->fetch()) {
 $Lien_Page_Avis_CT = $resultat9["Lien_Page_Avis_CT"];
}

if (isset($Lien_Page_Avis_CT) && !empty($Lien_Page_Avis_CT)) {
  echo "<p><a target='_blank' href='".$Lien_Page_Avis_CT."' class='btn btn-primary'>Information Importante</a></p>";
} else {
  echo "<p>
  Aucune information Importante
  </p>";
}


                    ?>





                    </p>
                 <!--  -->
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>


 <?php
  include "element-page/footer.php";
  ?>
