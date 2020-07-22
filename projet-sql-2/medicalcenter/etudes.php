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
                                <h2>Etudes</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <body>
<br>
<div class="titreRapport">
    <h2>Rédiger un rapport</h2>
</div>
<div id="formulaireRapport">
  <form>
    <br>
  <div class="form-group">
    <input type="text" class="form-control" id="auteurRapport" placeholder="Auteur">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="titreRapport" placeholder="Titre">
  </div>
  <div class="form-group">
<textarea class="form-control" id="contenuRapport" rows="3"  placeholder="Mon super rapport..."></textarea>
</div>
<div class="form-group">
  <input type="text" class="form-control" id="codeDossier" placeholder="Code Dossier">
</div>
<div class="bouttonRapport">
  <button type="button" id="bouttonPublication" class="btn btn-primary">&emsp;Publier mon rapport</button>
</div>
<br>
</form>
</div>
<br>
<div class="titreRapport">
    <h2>Consulter les rapports</h2>
</div>
<div class="consulterRapport">
	<?php
	$result = mysqli_query($connect,'SELECT * from Rapport
  ');

  while($row = mysqli_fetch_assoc($result)){
    $tab[] = $row;

  }
  foreach ($tab as $key => $value) {
      $return .= '
      <div class="whole-wrap">
        <div class="container box_1170">
          <div class="section-top-border">
            <h3 class="mb-30"><b>Auteur :</b> '.$value["Auteur"].'</h3>
            <div class="row">
              <div class="col-md-3">
                <p> <b> Titre du rapport : </b> '.$value["Titre"].'</p>
                <p> <b> Contenu : </b> '.$value["Contenu"].'</p>
								<p> <b> Code Dossier : </b> '.$value["Code Dossier"].'</p>
              </div>
            </div>
          </div>
        </div>
				</div>';

  }

	echo $return;
	 ?>

</div>
<br>
        <!-- Hero End -->
		<!-- Start Sample Area -->


    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

		<?php
		include 'footer.php';
		?>

  	<!-- JS Formulaire -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('#bouttonPublication').on('click',function(event){
			event.preventDefault();
			console.log('test');
      var auteur= $('#auteurRapport').val();
      var titreRapport = $('#titreRapport').val();
      var contenuRapport = $('#contenuRapport').val();
      var codeDossier = $('#codeDossier').val();

      $.ajax({
        url:'asyncform.php',
				method: 'POST',
				data: {
					auteur: auteur,
					titreRapport: titreRapport,
					contenuRapport: contenuRapport,
					codeDossier: codeDossier
				},success: function(data){
					if (data != 'error' || data != null) {
							$('.consulterRapport').append(data);
					}
					else {
						$('.consulterRapport').append('erreur');
					}
				}
      });
    });
  });
  </script>


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
