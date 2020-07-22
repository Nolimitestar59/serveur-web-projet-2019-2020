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
		 if (isset($_SESSION["nom"]) && !empty($_SESSION["nom"]) && isset($_SESSION["prenom"]) && !empty($_SESSION["prenom"])) {
		   $nom = $_SESSION["nom"];
		   $prenom = $_SESSION["prenom"];
		  ?>
		      <!-- Header -->
		        <header id="header">
		          <nav class="left">
		            <a href="#menu"><span>Menu</span></a>
		          </nav>
		          <a class="logo">Bonjour <?php echo $prenom ?> !</a>
		          <nav class="right">

		              <button onclick="deconnection();" class="button alt" type="button" name="button">Vous êtes connecter ✔</button>
		          </nav>
		        </header>

		      <!-- Menu -->
		        <nav id="menu">
		          <ul class="links">
		            <li><a href="index">Home</a></li>
		            <li><a href="generic.html">Generic</a></li>
		            <li><a href="elements.html">Elements</a></li>
		          </ul>
		          <ul class="actions vertical">
		            <li><a href="#" class="button fit">Login</a></li>
		          </ul>
		        </nav>

		 <?php
		 } else {
		   ?>
		   <!-- Header -->
		   <header id="header">
		     <nav class="left">
		       <a href="#menu"><span>Menu</span></a>
		     </nav>
		     <a class="logo">Bonjour à toi belle inconnue</a>
		     <nav class="right">
		       <a href="connexion" class="button alt">Connexion</a>
		     </nav>
		   </header>

		 <!-- Menu -->
		   <nav id="menu">
		     <ul class="links">
		       <li><a href="index.html">Home</a></li>
		       <li><a href="generic.html">Generic</a></li>
		       <li><a href="elements.html">Elements</a></li>
		     </ul>
		     <ul class="actions vertical">
		       <li><a href="connexion" class="button fit">Connexion</a></li>
		     </ul>
		   </nav>
		   <?php
		 }
		 ?>


     <section class="ftco-section">
       <div class="container">
         <div class="row">
           <div class="col-lg-8 ftco-animate">


             <h2 class="mb-3">It is a long established fact a reader be distracted</h2>

             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
             <p>
               <img src="images/image_6.jpg" alt="" class="img-fluid">
             </p>
             
             <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>




             <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
             <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
             <p>
               <img src="images/image_4.jpg" alt="" class="img-fluid">
             </p>

             <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
             <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
             <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
             <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>





           </div> <!-- .col-md-8 -->





           </div>

         </div>
       </div>
     </section> <!-- .section -->





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
