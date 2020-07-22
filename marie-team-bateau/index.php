<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Fotograp &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php

      // ici nous nous connectons à la base de donnée
      include "db/connectDB.php";

      // nous avons créer une page où se situe le header de la page, nous le récupérons à l'aide de cette commande
      include "page/header.php";
     ?>

<body>



    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7" data-aos="fade-up">
            <h2>Nos Secteurs</h2>
          </div>
        </div>

        <div class="row">

  <?php

  // ici nous récupérons tous les noms de secteurs existants dans la base de données
	$requete= $conn->query('SELECT * FROM secteur order by Nom ASC');
  while ($resultat = $requete->fetch()) {

            // on définie les variables par les valeurs récupéré dans la base de données
             $id = $resultat["id"];
             $nom = $resultat["Nom"];
             $img = $resultat["img"];
             ?>

          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <!-- On envoie l'id du secteur via l'url sur la page choix_port.php-->
            <a class="image-gradient" href="choix_port.php?id=<?php echo $id ?>">
              <figure>
                <!-- On affiche l'image en recupérant le chemin dans la base de donnée -->
                <img src="images/secteurs/<?php echo $img ?>" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $nom ?></h3>
              </div>
            </a>
          </div>

          <?php
        };
           ?>

        </div>


      </div>
    </div>


<?php

// ici on récupère le footer de la page
  include "page/footer.php";
 ?>



  </div>


  <script>
  // le javascript si dessous permet d'ajouter des animations sur le site afin d'obtenir un meilleur visuel
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

  </body>
</html>
