<!DOCTYPE html>

<?php
include 'header.php';
?>
<?php

  $CodeCis = 61266250;
  if(isset($_POST['CodeCis'])){
    $CodeCis = $_POST['CodeCis'];
    echo $CodeCis;
  }
?>


<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Information du Médicament</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="whole-wrap">
    <div class="container box_1170">
    <form method="GET">
       <p> Rechercher un médicament avec le codeCIS : </p>
       <input type="search" id="RechercheCIS" value="<?php echo $CodeCis ?>" />
       <input type="button" id="Recherche" value="Rechercher" />
    </form>
  </div>
</div>;

<script>
	$(document).ready(function(){
		$("#Recherche").on('click',function(event){
				var searchCIS = $("#RechercheCIS").val();
				$.ajax({
						url: 'asyncform.php',
						method : 'Post',
						data : {
							SearchCIS : searchCIS
						},
						success : function(data){
							if(data != ""){
								$('.CIS').html(data)
							}
							else{
								$('.CIS').html("<div class='container box_1170'> <p> Aucun résultat pour cette Recherche <p> </div>");
							}
						}
				});
		});
	});
</script>



<div class = "CIS">
  <?php
  $result = mysqli_query($connect,$requeteMed );
  while($row = mysqli_fetch_assoc($result)){
    $tab[] = $row;

  }
  foreach ($tab as $key => $value) {
      $return = '
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
          echo $return;
  }

  $CIP = mysqli_query($connect,$requeteCip );
  while($row = mysqli_fetch_assoc($CIP)){
    $tab2[] = $row;

  }

  foreach ($tab2 as $key => $value) {
    $return = '
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
        echo $return;
  }

  $Compo = mysqli_query($connect, $requeteCompo);
  while($rowCompo = mysqli_fetch_assoc($Compo)){
    $tabCompo[] = $rowCompo;
  }

  foreach ($tabCompo as $key => $value) {
      $returnCompo = '
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
          echo $returnCompo;
  }

  $CPD = mysqli_query($connect, $requeteCPD);
  while($rowCPD = mysqli_fetch_assoc($CPD)){
    $tabCPD[] = $rowCPD;
  }

  foreach ($tabCPD as $key => $value){
    if($value["condition_prescription"] != ""){

    $returnCPD = '
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
    $returnCPD ='
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
    echo $returnCPD;
  }
?>

<div class="whole-wrap">
  <div class="container box_1170">
    <div class="section-top-border">
      <h3 class="mb-30"><b>Génériques du Médicament : </h3>
      <?php
        $Gener = mysqli_query($connect,$requeteGener);
        while($rowGener = mysqli_fetch_assoc($Gener)){
          $tabGener[] = $rowGener;
        }

        foreach ($tabGener as $key => $value) {
          $returnGener ='

                <div class="row">
                  <div class="col-md-3">
                    <p><b> Groupe Générique : </b> '.$value["id_Group_Gene"].'</p>
                      <p><b> Nuémro de Trie : </b> '.$value["Num_Trie"].'</p>
                  </div>
                  <div class="col-md-9 mt-sm-20">
                    <p> <b> libelle du Groupe Générique : </b> '.$value["Libelle_Group_Gene"].'</p>
                    <p><b> Type du Générique  : </b> '.$value["Type_Gene"].'</p>
                  </div>
            ';
              echo $returnGener;
        }
         ?>
       </div>
     </div>
     </div>'

    <div class="whole-wrap">
       <div class="container box_1170">
         <div class="section-top-border">
           <?php


           ?>
         </div>
      </div>
    </div>'


</div>


<?php
	include 'footer.php';
?>

      <!-- Scroll Up -->
      <div id="back-top" >
          <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
      </div>

  	<!-- JS here -->

  	<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
  	<!-- Jquery, Popper, Bootstrap -->
  	<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
  	<script src="./assets/js/popper.min.js"></script>
  	<script src="./assets/js/bootstrap.min.js"></script>
  	<!-- Jquery Mobile Menu -->
  	<script src="./assets/js/jquery.slicknav.min.js"></script>

  	<!-- Jquery Slick , Owl-Carousel Plugins -->
  	<script src="./assets/js/owl.carousel.min.js"></script>
  	<script src="./assets/js/slick.min.js"></script>
  	<!-- One Page, Animated-HeadLin -->
  	<script src="./assets/js/wow.min.js"></script>
  	<script src="./assets/js/animated.headline.js"></script>
  	<script src="./assets/js/jquery.magnific-popup.js"></script>

  	<!-- Nice-select, sticky -->
  	<script src="./assets/js/jquery.nice-select.min.js"></script>
  	<script src="./assets/js/jquery.sticky.js"></script>

  	<!-- contact js -->
  	<script src="./assets/js/contact.js"></script>
  	<script src="./assets/js/jquery.form.js"></script>
  	<script src="./assets/js/jquery.validate.min.js"></script>
  	<script src="./assets/js/mail-script.js"></script>
  	<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

  	<!-- Jquery Plugins, main Jquery -->
  	<script src="./assets/js/plugins.js"></script>
  	<script src="./assets/js/main.js"></script>

  	</body>
  </html>
