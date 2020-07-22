<?php
	session_start();
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Devsonnel, créer et participer à des évenements</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:400,500" rel="stylesheet">
			<!--
					CSS
					============================================= -->
			<link rel="stylesheet" href="presentationEvenement/css/linearicons.css">
			<link rel="stylesheet" href="presentationEvenement/css/font-awesome.min.css">
			<link rel="stylesheet" href="presentationEvenement/css/bootstrap.css">
			<link rel="stylesheet" href="presentationEvenement/css/owl.carousel.css">
			<link rel="stylesheet" href="presentationEvenement/css/magnific-popup.css">
			<link rel="stylesheet" href="presentationEvenement/css/nice-select.css">
			<link rel="stylesheet" href="presentationEvenement/css/main.css">
	</head>
	<body>
		<script type="text/javascript">
		function deconnection(){
			Swal.fire({
	 title: 'Juste pour être sûre',
	 text: "Vous souhaitez vous déconnecter ?",
	 icon: 'warning',
	 showCancelButton: true,
	 confirmButtonColor: '#3085d6',
	 cancelButtonColor: '#d33',
	 confirmButtonText: 'Oui !',
	 cancelButtonText : 'Non...'
 }).then((result) => {
	 if (result.value) {
		 document.location = 'bdd/indexPage.php';

	 }
 })
		}




		</script>

		<?php
			include "bdd/connectionBdd.php";
		 ?>

		 <?php
		 		include "elementPage/header.php";
		  ?>


		 <?php
		 if (isset($_GET["id"]) && !empty($_GET["id"])) {
		 	$id = $_GET["id"];
			$requete= $bdd->query("SELECT * FROM presentationEvenement where idEvenement = ".$id." limit 1");

			while ($resultat = $requete->fetch()) {
				$titreEvenement = $resultat["titreEvenement"];
				$createurEvenement = $resultat["createurEvenement"];
				$nbParticipant = $resultat["nbParticipant"];
				$lienTwitter = $resultat["lienTwitter"];
				$facebook = $resultat["facebook"];
				$lienInstagram = $resultat["lienInstagram"];
				$titreLogo1 = $resultat["titreLogo1"];
				$textLogo1 = $resultat["textLogo1"];
				$titreLogo2 = $resultat["titreLogo2"];
				$textLogo2 = $resultat["textLogo2"];
				$titreLogo3 = $resultat["titreLogo3"];
				$textLogo3 = $resultat["textLogo3"];
				$titreLogo4 = $resultat["titreLogo4"];
				$textLogo4 = $resultat["textLogo4"];
				$imageAbout = $resultat["imageAbout"];
				$titreAbout = $resultat["titreAbout"];
				$textAbout = $resultat["textAbout"];
				$imagePresentation = $resultat["imagePresentation"];



		 }
		 	 }

		  ?>



		 <section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="presentationEvenement/img/header-bg.jpg">
	 		<div class="overlay-bg overlay"></div>
	 		<h1 class="template-name">00<?php echo $nbParticipant; ?></h1>
	 		<div class="container">
	 			<div class="row fullscreen">
	 				<div class="banner-content col-lg-12">
	 					<p><?php echo $createurEvenement; ?></p>
	 					<h1>
	 						<?php
									echo $titreEvenement;
							 ?>
	 					</h1>
						<?php
							if (isset($_SESSION["nom"]) && !empty($_SESSION["nom"]) && isset($_SESSION["prenom"]) && !empty($_SESSION["prenom"])) {
						 ?>
						 <form method="post">
							 	<button href="#" type="submit" name="rejoindre" value="test" class="primary-btn">Rejoindre !</button>
								<?php
									if (isset($_POST["rejoindre"])) {
									$requete= $bdd->query("SELECT * FROM evenement where nomEvenement like '%". $saisie ."%' or createurEvenement like '%". $saisie ."%'");
									}
								 ?>
						 </form>

						<?php
					} else {
						?>
							<a href="connexion.php?id=<?php echo $id;?>" class="primary-btn">Connectez-vous pour y participer !</a>
						<?php
					}
						 ?>
	 				</div>
	 			</div>
	 		</div>
	 		<div class="head-bottom-meta">
	 			<div class="d-flex meta-left no-padding">
	 				<a target="_blank" href="<?php echo $facebook; ?>"><span class="fa fa-facebook-f"></span></a>
	 				<a target="_blank" href="<?php echo $lienTwitter; ?>"><span class="fa fa-twitter"></span></a>
	 				<a target="_blank" href="<?php echo $lienInstagram; ?>"><span class="fa fa-instagram"></span></a>
	 			</div>
	 		</div>
	 	</section>






			<!-- Start features Area -->
			<section class="features-area section-gap-top" id="news">
				<div class="container">
					<div class="row feature_inner">
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-compass"></i>
								<h4><?php echo $titreLogo1; ?></h4>
								<p><?php echo $textLogo1; ?></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-desk"></i>
								<h4><?php echo $titreLogo2; ?></h4>
								<p><?php echo $textLogo2; ?></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-bathroom"></i>
								<h4><?php echo $titreLogo3; ?></h4>
								<p><?php echo $textLogo3; ?></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-beach"></i>
								<h4><?php echo $titreLogo4; ?></h4>
								<p><?php echo $textLogo4; ?></p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Start About Area -->
			<section class="about-area section-gap">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-lg-7 col-md-12 about-left">
							<img class="img-fluid" src="<?php echo $imageAbout; ?>" alt="">
						</div>
						<div class="col-lg-5 col-md-12 about-right">
							<div class="section-title text-left">
								<h4>A-propos</h4>
								<h2><?php echo $titreAbout; ?></h2>
							</div>
							<div>
								<p>
								<?php echo $textAbout; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
































	<?php
			include "elementPage/footer.php";
	 ?>
	 <script src="presentationEvenement/js/vendor/jquery-2.2.4.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="presentationEvenement/anonymous"></script>
	 <script src="presentationEvenement/js/vendor/bootstrap.min.js"></script>
	 <script src="presentationEvenement/js/jquery.ajaxchimp.min.js"></script>
	 <script src="presentationEvenement/js/parallax.min.js"></script>
	 <script src="presentationEvenement/js/owl.carousel.min.js"></script>
	 <script src="presentationEvenement/js/isotope.pkgd.min.js"></script>
	 <script src="presentationEvenement/js/jquery.nice-select.min.js"></script>
	 <script src="presentationEvenement/js/jquery.magnific-popup.min.js"></script>
	 <script src="presentationEvenement/js/jquery.sticky.js"></script>
	 <script src="presentationEvenement/js/main.js"></script>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
