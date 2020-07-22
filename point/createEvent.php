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

<form method="get">



		 <section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="presentationEvenement/img/header-bg.jpg">
	 		<div class="overlay-bg overlay"></div>
	 		<h1 class="template-name">00000</h1>
	 		<div class="container">
	 			<div class="row fullscreen">
	 				<div class="banner-content col-lg-12">

	 					<p><input type="text" name="saisieCreaEvent" value="" placeholder="saisir createur event"></p>
	 					<h1>
	 						<input type="text" name="saisieTitreEvent" value="" placeholder="titre event">
	 					</h1>
	 				</div>
	 			</div>
	 		</div>
	 		<div class="head-bottom-meta">
	 			<div class="d-flex meta-left no-padding">
	 				<div style="padding-right: 2%" ><span class="fa fa-facebook-f"></span> <input type="text" name="lienFacebook" placeholder="lien de votre compte"></div>
	 				<div style="padding-right: 2%"><span class="fa fa-twitter"></span><input type="text" name="lienTwitter" placeholder="lien de votre compte"></div>
	 				<div style="padding-right: 2%"><span class="fa fa-instagram"></span><input type="text" name="lienInstagram" placeholder="lien de votre compte"></div>
          <div style="padding-right: 2%">Date et heure de début <input name="dateHeure" type="datetime-local"></div>
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
								<h4><input type="text" name="titreLogo1" placeholder="Titre de votre Logo"></h4>
								<p><textarea name="textLogo1" style="height: 150px" cols="9" placeholder="Description de votre Logo"></textarea></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-desk"></i>
                <h4><input type="text" name="titreLogo2" placeholder="Titre de votre Logo"></h4>
								<p><textarea name="textLogo2" style="height: 150px" cols="9" placeholder="Description de votre Logo"></textarea></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-bathroom"></i>
                <h4><input type="text" name="titreLogo3" placeholder="Titre de votre Logo"></h4>
								<p><textarea name="textLogo3" style="height: 150px" cols="9" placeholder="Description de votre Logo"></textarea></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="feature-item">
								<i class="fi flaticon-beach"></i>
                <h4><input type="text" name="titreLogo4" placeholder="Titre de votre Logo"></h4>
								<p><textarea name="textLogo4" style="height: 150px" cols="9" placeholder="Description de votre Logo"></textarea></p>
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
							<img class="img-fluid" src="images/a-propos.jpg" alt="">
						</div>
						<div class="col-lg-5 col-md-12 about-right">
							<div class="section-title text-left">
								<h4>A-propos</h4>
								<h3><input type="text" name="titreAbout" placeholder="Titre des choses à savoir en plus"></h3>
							</div>
							<div>
								<p>
  								<textarea name="descAbout" style="height: 150px" cols="9" placeholder="Description des choses qu'il faut savoir"></textarea>
								</p>
							</div>
						</div>
					</div>
				</div>

        <br>
        <br>
        <button type="submit" style="margin-left:55%; margin-right:20%" class="primary-btn">Créer l'évenement !</button>

			</section>




</form>



<?php
    if(isset($_SESSION["id"])){
 ?>


<?php

if(
  isset($_GET["saisieCreaEvent"]) && !empty($_GET["saisieCreaEvent"]) &&
  isset($_GET["saisieTitreEvent"]) && !empty($_GET["saisieTitreEvent"]) &&
  isset($_GET["lienFacebook"]) && !empty($_GET["lienFacebook"]) &&
  isset($_GET["lienTwitter"]) && !empty($_GET["lienTwitter"]) &&
  isset($_GET["lienInstagram"]) && !empty($_GET["lienInstagram"]) &&
  isset($_GET["titreLogo1"]) && !empty($_GET["titreLogo1"]) &&
  isset($_GET["textLogo1"]) && !empty($_GET["textLogo1"]) &&
  isset($_GET["titreLogo2"]) && !empty($_GET["titreLogo2"]) &&
  isset($_GET["textLogo2"]) && !empty($_GET["textLogo2"]) &&
  isset($_GET["titreLogo3"]) && !empty($_GET["titreLogo3"]) &&
  isset($_GET["textLogo3"]) && !empty($_GET["textLogo3"]) &&
  isset($_GET["titreLogo4"]) && !empty($_GET["titreLogo4"]) &&
  isset($_GET["textLogo4"]) && !empty($_GET["textLogo4"]) &&
  isset($_GET["titreAbout"]) && !empty($_GET["titreAbout"]) &&
  isset($_GET["descAbout"]) && !empty($_GET["descAbout"]) &&
  isset($_GET["dateHeure"]) && !empty($_GET["dateHeure"])
){
    $saisieCreaEvent = htmlspecialchars($_GET["saisieCreaEvent"]);
    $saisieTitreEvent = htmlspecialchars($_GET["saisieTitreEvent"]);
    $lienFacebook = htmlspecialchars($_GET["lienFacebook"]);
    $lienTwitter = htmlspecialchars($_GET["lienTwitter"]);
    $lienInstagram = htmlspecialchars($_GET["lienInstagram"]);
    $titreLogo1 = htmlspecialchars($_GET["titreLogo1"]);
    $textLogo1 = htmlspecialchars($_GET["textLogo1"]);
    $titreLogo2 = htmlspecialchars($_GET["titreLogo2"]);
    $textLogo2 = htmlspecialchars($_GET["textLogo2"]);
    $titreLogo3 = htmlspecialchars($_GET["titreLogo3"]);
    $textLogo3 = htmlspecialchars($_GET["textLogo3"]);
    $titreLogo4 = htmlspecialchars($_GET["titreLogo4"]);
    $textLogo4 = htmlspecialchars($_GET["textLogo4"]);
    $titreAbout = htmlspecialchars($_GET["titreAbout"]);
    $descAbout = htmlspecialchars($_GET["descAbout"]);

    $etat = "active";
    $themes = "jeux, dance, musique";

    $nbParticipant = 1;
    $idUsers = $_SESSION["id"];

    $imgEvent = "zaezaezae";
		$imgAbout = "zezaeaz";

     $sql = "INSERT INTO evenement ( nomEvenement, etat, nbParticipant, themes, idCreateurEvenement, createurEvenement,imageEvenement) VALUES ('". $saisieTitreEvent . "', '". $etat ."', '". $nbParticipant ."',
        '". $themes ."', ". $idUsers .",'". $saisieCreaEvent ."', '". $imgEvent ."')";



        try {
          $bdd->exec($sql);
        } catch (\Exception $e) {
          echo "probleme sql";
        }

        $requete= $bdd->query("SELECT * FROM evenement where nomEvenement like '". $saisieTitreEvent ."' and createurEvenement like '". $saisieCreaEvent ."' and idCreateurEvenement like '". $idUsers ."' limit 1");

        while ($resultat = $requete->fetch()) {
            $idEvent = $resultat["id"];
        }


					$sql2 = "INSERT INTO `presentationEvenement` (`id`, `idEvenement`, `titreEvenement`, `createurEvenement`, `nbParticipant`, `lienTwitter`, `facebook`, `lienInstagram`, `titreLogo1`, `textLogo1`, `titreLogo2`, `textLogo2`, `titreLogo3`, `textLogo3`, `titreLogo4`, `textLogo4`, `imageAbout`, `titreAbout`, `textAbout`, `imagePresentation`)
					VALUES (
						NULL,
						 '". $idEvent ."',
						 '". $saisieTitreEvent ."',
						 '". $saisieCreaEvent ."',
						 '1',
						 '". $lienTwitter ."',
						 '". $lienFacebook ."',
						 '". $lienInstagram ."',
						 '". $titreLogo1 ."',
						 '". $textLogo1 ."',
						 '". $titreLogo2 ."',
						 '". $textLogo2 ."',
						 '". $titreLogo3 ."',
						 '". $textLogo3 ."',
						 '". $titreLogo4 ."',
						 '". $textLogo4 ."',
						 '". $imgAbout ."',
						 '". $titreAbout ."',
						 '". $descAbout ."',
						 '". $imgEvent ."'
					 );";

					try {
$bdd->exec($sql2);
echo "<script>
  document.location.href='accueil-evenement';
</script>";

	        } catch (\Exception $e) {
						echo $e;
	          echo "probleme sql";
	        }
    }




} else {
echo "pas de id bro";
}
 ?>




















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
