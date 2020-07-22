<?php
include 'header.php';
?>
	<main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Medicaments</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
		<!-- Start Sample Area -->
		<div>
	</div>

	<div class="whole-wrap">
			<div class="container box_1170">
			<p> Nombre total de Medicaments = <?php echo $total ?> </p>
			<form method="GET">
			   <input type="search" id="Recherche" name="q" placeholder="Recherche..." />
			   <input type="button" id="valider" value="Valider" />
			</form>
		</div>
	</div>;

<script>
	$(document).ready(function(){
		$("#valider").on('click',function(event){
				var searchCondition = $("#Recherche").val();
				$.ajax({
						url: 'asyncform.php',
						method : 'Post',
						data : {
							Search : searchCondition
						},
						success : function(data){
							if(data != ""){
								$('.medicaments').html(data)
							}
							else{
								$('.medicaments').html("<div class='container box_1170'> <p> Aucun résultat pour cette Recherche <p> </div>");
							}
						}
				});
		});
	});
</script>

<div class="medicaments">
<?php

		$result = mysqli_query($connect,$requete);
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
									<p> <input type="button" class="infomedicament" id='.$value["CODE_CIS"].' value="Voir infos" /></p>
								</div>
							</div>
						</div>
						</div>';
						echo $return;
		}

		?>


</div>





		<!-- Start Align Area -->

	</main>

		<?php
		include 'footer.php';
		?>

    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

	<!-- JS here -->

	<script>
		 $(document).ready(function(){
			 	$('#RechercheCIS').val('test');
			 $(".infomedicament").on('click',function(event){
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
							$('#RechercheCIS').val(CodeCis);
					 }
				 });
			 });
		 });
	</script>

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
