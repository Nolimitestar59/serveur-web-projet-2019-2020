<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Fotograp &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
      include "db/connectDB.php";
      include "page/header.php";
     ?>

<body>

    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7" data-aos="fade-up">
            <h2>Nos Ports</h2>
          </div>
        </div>

        <div class="row">

  <?php

	$requete= $conn->query('SELECT * FROM port');
  while ($resultat = $requete->fetch()) {
             $id= $resultat["id"];
             $nom= $resultat["nom"];
             $img= $resultat["image_port"];
        ?>
          

          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <a class="image-gradient" href="affichage.php?id=<?php echo $id ?>">
              <figure>
                <img src="images/ports/<?php echo $img ?>" alt="" class="img-fluid">
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
  include "page/footer.php";
 ?>



  </div>


  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

  </body>
</html>
