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




			<link rel="stylesheet" href="template-mes-events/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="template-mes-events/bootstrap/css/bootstrap-grid.min.css">
			<link rel="stylesheet" href="template-mes-events/bootstrap/css/bootstrap-reboot.min.css">
			<link rel="stylesheet" href="template-mes-events/assets/css/main.css" />
			<noscript><link rel="stylesheet" href="template-mes-events/assets/css/noscript.css" /></noscript>
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

<br><br>
<?php
$id = $_SESSION["id"];
$requete= $bdd->query("SELECT * FROM evenement where idCreateurEvenement = '" . $id . "';" );
 ?>
 <div id="main">
	 <div class="inner">
		 <section class="tiles">
		 <?php
		 while ($resultat = $requete->fetch()) {
$nomEvenement = htmlspecialchars($resultat["nomEvenement"]);
$nbParticipant = htmlspecialchars($resultat["nbParticipant"]);
$dateDebut = $resultat["dateDebut"];
$randStyle = rand(1,6);
			  ?>

			 <article <?php echo "class='style". $randStyle ."'";?>>
				 <span class="image">
					 <img src="template-mes-events/images/pic01.jpg" alt="" />
				 </span>
				 <a href="gestion-event.php?nomEvenement=<?php echo $nomEvenement; ?>">
					 <h2 style="color:white;"><?php echo $nomEvenement; ?></h2>
					 <div class="content">
						 <p><?php echo $nbParticipant . " participants"; ?></p>
						 <p><?php echo $dateDebut; ?></p>
					 </div>
				 </a>
			 </article>

<?php
}
 ?>
		 </section>
	 </div>
 </div>



<br><br>

	<?php
			include "elementPage/footer.php";
	 ?>

		<!-- Scripts -->
		<script src="template-mes-events/assets/js/jquery.min.js"></script>
		<script src="template-mes-events/assets/js/browser.min.js"></script>
		<script src="template-mes-events/assets/js/breakpoints.min.js"></script>
		<script src="template-mes-events/assets/js/util.js"></script>
		<script src="template-mes-events/assets/js/main.js"></script>

		<script type="text/javascript" src="template-mes-events/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="template-mes-events/bootstrap/js/bootstrap.min.js"></script>


			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
