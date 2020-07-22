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

    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/css/util.css">
    	<link rel="stylesheet" type="text/css" href="templateFormulaireInscription/css/main.css">
    <!--===============================================================================================-->

	</head>
	<body>

		<?php
			include "bdd/connectionBdd.php";
			include "elementPage/header.php";
		 ?>
     <div class="limiter">
   		<div class="container-login100">
   			<div class="wrap-login100">
   				<div class="login100-pic js-tilt" data-tilt>
   					<img src="templateFormulaireInscription/images/img-01.png" alt="IMG">
   				</div>

   				<form method="post" class="login100-form validate-form">
   					<span class="login100-form-title">
   						Créer un compte
   					</span>
            <span class="login100-form-title-2">
              Tout va bien, la cavalerie est là !
   					</span>

   					<div class="wrap-input100 validate-input" data-validate = "Veuillez renseigner votre nom">
   						<input class="input100" type="text" name="nom" placeholder="Nom">
   						<span class="focus-input100"></span>
   					</div>

   					<div class="wrap-input100 validate-input" data-validate = "Veuillez renseigner votre prenom">
   						<input class="input100" type="text" name="prenom" placeholder="Prénom">
   						<span class="focus-input100"></span>
   					</div>

						<div class="wrap-input100 validate-input" data-validate = "Veuillez renseigner votre prenom">
   						<input class="input100" type="text" name="age" placeholder="Age">
   						<span class="focus-input100"></span>
   					</div>

            <div class="wrap-input100 validate-input" data-validate = "L'adresse mail doit être sous un format valide : ex@abc.xyz">
   						<input class="input100" type="text" name="email" placeholder="E-mail">
   						<span class="focus-input100"></span>
   					</div>

   					<div class="wrap-input100 validate-input" data-validate = "Un mot de passe est nécessaire">
   						<input class="input100" type="password" name="mdp" placeholder="Mot de passe">
   						<span class="focus-input100"></span>
   					</div>

            <div class="wrap-input100 validate-input" data-validate = "Un mot de passe est nécessaire">
   						<input class="input100" type="password" name="mdp2" placeholder="Resaisir votre mot de passe">
   						<span class="focus-input100"></span>
   					</div>

   					<div class="container-login100-form-btn">
              <input class="login100-form-btn" type="submit" name="" value="Inscription">
   					</div>

   					<div class="text-center p-t-12">
   						<a class="txt2" href="#">
   							Vous avez déjà un compte ?
   						</a>
   					</div>
   				</form>
   			</div>
   		</div>
   	</div>





     <?php
		 	 include "bdd/addParticipantFormInscription.php";
       include "elementPage/footer.php";
      ?>

      <!--===============================================================================================-->
      	<script src="templateFormulaireInscription/vendor/jquery/jquery-3.2.1.min.js"></script>
      <!--===============================================================================================-->
      	<script src="templateFormulaireInscription/vendor/bootstrap/js/popper.js"></script>
      	<script src="templateFormulaireInscription/vendor/bootstrap/js/bootstrap.min.js"></script>
      <!--===============================================================================================-->
      	<script src="templateFormulaireInscription/vendor/select2/select2.min.js"></script>
      <!--===============================================================================================-->
      	<script src="templateFormulaireInscription/vendor/tilt/tilt.jquery.min.js"></script>
      	<script >
      		$('.js-tilt').tilt({
      			scale: 1.1
      		})
      	</script>
      <!--===============================================================================================-->
      	<script src="templateFormulaireInscription/js/main.js"></script>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
