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



		<!-- Banner -->
			<section id="banner">
				<div class="content">
					<h1>
						Devsonnel vous accompagne</h1>
					<p>Vous souhaitez créer un évenement ou participer à un évenement <br>
						 tout en restant derrière votre écran ?
					Alors vous êtes à la bonne place </p>
					<ul class="actions">
						<li><a href="inscription" class="button scrolly">Inscription</a></li>
					</ul>
					<ul class="actions">
						<li><a href="accueil-evenement" class="button scrolly">Voir nos Evenements</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner flex flex-3">
					<div class="flex-item left">
						<div>
							<h3>Création</h3>
							<p>Nous vous accompagnons dans la réalisation et l'organisation de votre projet</p>
						</div>
						<div>
							<h3>Ipsum adipiscing lorem</h3>
							<p>Tristique yonve cursus jam nulla quam<br /> loreipsu gravida adipiscing lorem</p>
						</div>
					</div>
					<div class="flex-item image fit round">
						<img src="images/pic01.jpg" alt="" />
					</div>
					<div class="flex-item right">
						<div>
							<h3>Partage</h3>
							<p>Découvrez les évémenements disponibles, </p>
						</div>
						<div>
							<h3>Suscipit nibh dolore</h3>
							<p>Pellentesque egestas sem. Suspendisse<br /> modo ullamcorper feugiat lorem.</p>
						</div>
					</div>
				</div>
			</section>





	<?php
			include "elementPage/footer.php";
	 ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
