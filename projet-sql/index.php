<?php
    include "element-page/header.php";
 ?>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-4">Nos médecins sont à vos dispositions</h1>
            <p>La Haute Autorité de Santé (HAS) évalue d’un point de vue médical et économique les produits, actes, prestations et technologies de santé, en vue de leur admission au remboursement.</p>
          </div>
        </div>
      </div>
    </div>



    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nos médecins expérimentés</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-lg-4 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/docteur-fuko.gif);">
	                <div class="box">
	                  <h2>Orak Hakan</h2>
	                  <p>Neurologiste</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo; Assasin dans ma cave, j'ai appris à tuer des gens et j'essaye de les soigner et les retuer afin d'avoir UN MAX DE PLAISIR PTN !!!!
                       &rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(images/docteur-fuko.gif);"></div>
	                  </div>
	                  <div class="name align-self-center">Orak Hakan <span class="position">Assasin</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>

	        <div class="col-md-6 col-lg-4 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/doctor-2.png);">
	                <div class="box">
	                  <h2>Vicart Antoine</h2>
	                  <p>Chirugien</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Je suis actuellement chirugien sans aucunes études et possède déjà plusieurs opérations à mon actifs, mes collégues et moi même avons des méthodes révolutionnaire. Très précis dans mes opérations, je suis serieux et motivé.&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(images/doctor-2.png);"></div>
	                  </div>
	                  <div class="name align-self-center">Vicart Antoine<span class="position">Chirugien</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-4 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url(https://img-comment-fun.9cache.com/media/a08gqWq/aVlbqraW_700w_0.jpg);"> <!-- https://img-comment-fun.9cache.com/media/a08gqWq/aVlbqraW_700w_0.jpg -->
	                <div class="box">
	                  <h2>Rakza Fayçal</h2>
	                  <p>Pharmacien</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>Peut ressusciter les morts</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url(https://img-comment-fun.9cache.com/media/a08gqWq/aVlbqraW_700w_0.jpg);"></div>
	                  </div>
	                  <div class="name align-self-center">Fayçal Rakza <span class="position">Pharmacien</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number=
                    <?php
                    require './bdd/connect.php';
                    $un = $bdd->prepare("SELECT COUNT(Etat_Commerce) FROM `CIS_CIP_bdpm` WHERE Etat_Commerce = 'Déclaration de commercialisation'");
                    $un->execute();
                    $un = $un->fetchAll();
                    foreach ($un as $value) {

                        echo '"' . $value["COUNT(Etat_Commerce)"] . '", ';
                    }
                    ?>
                    >0</strong>
		                <span>médicaments commercialisés</span>
		              </div>
		            </div>
		          </div>
              <!--
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="0">0</strong>
		                <span>médicaments sous surveillance renforcée et commercialisé</span>
		              </div>
		            </div>
		          </div>
            -->
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number=
                    <?php
                    require './bdd/connect.php';
                    $trois = $bdd->prepare("SELECT COUNT(*) FROM CIS_HAS_SMR WHERE Valeur_SMR = 'Important' OR Valeur_SMR = 'Modéré'");
                    $trois->execute();
                    $trois = $trois->fetchAll();
                    foreach ($trois as $value) {

                        echo '"' . $value["COUNT(*)"] . '", ';
                    }
                    ?>

                    >0</strong>
		                <span>médicaments ayant un avis favorable de SMR</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number=
                    <?php
                    require './bdd/connect.php';
                    $quatre = $bdd->prepare("SELECT COUNT(*) FROM CIS_HAS_ASMR_bdpm WHERE Valeur_ASMR='V'");
                    $quatre->execute();
                    $quatre = $quatre->fetchAll();
                    foreach ($quatre as $value) {

                        echo '"' . $value["COUNT(*)"] . '", ';
                    }
                    ?>
                    >0</strong>
		                <span>médicaments ayant un niveau 5 d’ASMR</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <br><br>

  <?php
    include "element-page/footer.php";
   ?>
