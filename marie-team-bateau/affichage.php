<?php
  include "page/header.php";

  include "db/connectDB.php";
 ?>

 <?php

   if (isset($_GET["id"])) {
    $id= $_GET["id"];
   }

   $requete= $conn->query('SELECT * FROM port where id='.$id.' LIMIT 1');
   while ($resultat = $requete->fetch()) {
              $id= $resultat["id"];
              $nom= $resultat["nom"];
              $img= $resultat["image_port"];
              $description= $resultat["description"];



}


    ?>

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('images/ports/<?php echo  $img; ?>');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1><?php echo $nom; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="py-3 mb-5 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 d-md-flex align-items-center">
            <h2 class="text-black mb-5 mb-md-0 text-center text-md-left">Réserver votre Billet pour <?php echo $nom;?></h2>
            <div class="ml-auto text-center text-md-left">
             <a href="choix_port.php?id=<?php echo $id; ?>" style="color:white;" class="btn btn-success py-3 px-5 rounded">RESERVER</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
            <div class="col-md-6  mb-5">
              <img src="images/ports/<?php echo  $img; ?>" alt="Images" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto">
              <?php
                echo $description;
               ?>
               </div>
          </div>
      </div>
    </div>


<?php
  include "page/footer.php";
 ?>
