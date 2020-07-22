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
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

      <link rel="stylesheet" href="tableauPresent/css/open-iconic-bootstrap.min.css">
      <link rel="stylesheet" href="tableauPresent/css/animate.css">

      <link rel="stylesheet" href="tableauPresent/css/owl.carousel.min.css">
      <link rel="stylesheet" href="tableauPresent/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="tableauPresent/css/magnific-popup.css">

      <link rel="stylesheet" href="tableauPresent/css/aos.css">

      <link rel="stylesheet" href="tableauPresent/css/ionicons.min.css">

      <link rel="stylesheet" href="tableauPresent/css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="tableauPresent/css/jquery.timepicker.css">


      <link rel="stylesheet" href="tableauPresent/css/flaticon.css">
      <link rel="stylesheet" href="tableauPresent/css/icomoon.css">
      <link rel="stylesheet" href="tableauPresent/css/style.css">
 	</head>

  <body>

 		<?php
 			include "bdd/connectionBdd.php";
 		 ?>

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
      document.location = 'bdd/decoUserAccueilEvenement.php';
    }
  })
     }
     </script>


     <?php
         include "elementPage/header.php";
      ?>


<form method="get" action="accueil-evenement">

<section class="ftco-subscribe img" style="background-image: url(tableauPresent/images/bg_1.jpg);">
  <div class="overlay">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-wrap text-center heading-section heading-section-white ftco-animate">
          <h2>Rechercher votre Evenement !</h2>
          <div class="row d-flex justify-content-center mt-4 mb-4">
            <div class="col-md-10">
              <form class="subscribe-form">
                <div class="form-group d-flex">
                  <input name="saisie" type="text" class="form-control" placeholder="Titre ? Nom de l'organisation ? ">
                  <input type="submit" value="Rechercher" class="submit px-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</form>


<?php
if (isset($_GET["saisie"]) && !empty($_GET["saisie"])) {

  $saisie =$_GET["saisie"];
    $requete= $bdd->query("SELECT * FROM evenement where nomEvenement like '%". $saisie ."%' or createurEvenement like '%". $saisie ."%'");
} else {
  $requete= $bdd->query("SELECT * FROM evenement");
}

while ($resultat = $requete->fetch()) {
$id = $resultat["id"];
$nomEvenement = $resultat["nomEvenement"];
$plateforme = $resultat["plateforme"];
$themes = $resultat["themes"];
$createurEvenement = $resultat["createurEvenement"];
$dateDebut = $resultat["dateDebut"];

?>

<br><br><br>
<div id="comments">
  <section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="game-wrap-1 ftco-animate p-4">
            <div class="row p-2">
              <div class="col-md-6 pb-4 pb-lg-0 col-lg-3">
                <div class="text d-flex">
                  <div class="team-logo d-flex">
                    <div class="img" style="background-image: url(images/team-1.jpg);"></div>
                    <div class="img img-2" style="background-image: url(images/team-2.jpg);"></div>
                  </div>
                  <div class="team-name pl-3">
                    <h3><?php echo $nomEvenement; ?></h3>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pb-4 pb-lg-0 col-lg-3">
                <div class="text">
                  <div class="img"></div>
                  <h3 class="league"><?php echo $createurEvenement; ?></h3>
                  <span><?php echo $themes; ?></span>
                </div>
              </div>
              <div class="col-md-6 pb-4 pb-lg-0 col-lg-4">
                <div class="text">
                  <div id="timer" class="d-flex mb-0">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pb-4 pb-lg-0 col-lg-2">
                <div class="text">
                  <p class="mb-0"><a href="presentation-evenement.php?id=<?php echo $id; ?>" class="btn btn-primary py-3">Participer</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>




<?php
}

 ?>

<br>



















 	<?php
 			include "elementPage/footer.php";
 	 ?>
   <script src="tableauPresent/js/jquery.min.js"></script>
   <script src="tableauPresent/js/jquery-migrate-3.0.1.min.js"></script>
   <script src="tableauPresent/js/popper.min.js"></script>
   <script src="tableauPresent/js/bootstrap.min.js"></script>
   <script src="tableauPresent/js/jquery.easing.1.3.js"></script>
   <script src="tableauPresent/js/jquery.waypoints.min.js"></script>
   <script src="tableauPresent/js/jquery.stellar.min.js"></script>
   <script src="tableauPresent/js/owl.carousel.min.js"></script>
   <script src="tableauPresent/js/jquery.magnific-popup.min.js"></script>
   <script src="tableauPresent/js/aos.js"></script>
   <script src="tableauPresent/js/jquery.animateNumber.min.js"></script>
   <script src="tableauPresent/js/bootstrap-datepicker.js"></script>
   <script src="tableauPresent/js/scrollax.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
   <script src="tableauPresent/js/google-map.js"></script>
   <script src="tableauPresent/js/main.js"></script>
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/jquery.scrolly.min.js"></script>
   <script src="assets/js/skel.min.js"></script>
   <script src="assets/js/util.js"></script>
   <script src="assets/js/main.js"></script>
 	</body>
 </html>
