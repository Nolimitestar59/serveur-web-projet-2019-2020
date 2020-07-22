<?php
    include "element-page/header.php";
    include "bdd/connect.php";

    if (!isset($_GET["page"]) && empty($_GET["page"])) {
      $page = 1;
      $limit1 = 0;
      $limit2 = 10;
    } else {
      if ($_GET["page"] <= 0) {
        $page = 1;
      } else {
      $page = $_GET["page"];
      }
      $limit1 = $limit1 + 10*($page-1);
      $limit2 = 10;//$limit2 + 10*($page);
    }

    // echo $limit1 . "<br>";
    // echo $limit2. "<br>";
    $limit = $limit1 . "," . $limit2;
    $test = $limit1 + $limit2;
  //  echo 'Medicaments n°'.$limit1.' jusque n°'.$test;

 ?>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"></span> bienvenue sur la page des présentations des médicaments, vous y trouverez une énorme quantité de médicaments, je vous conseillerai donc d'utiliser la barre de recherche (;</p>
            <h1 class="mb-3 bread">Médicaments</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Rechercher votre médicament</h2>
              <p>Nous réalisons la recherche à l'aide du nom, etc... cela vous facilitera la vie, je vous le garanti.</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form method="get" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input name="recherche" type="text" class="form-control" placeholder="Rechercher votre médicament">
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


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nos Médicaments</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ftco-animate">


            <?php
            if (isset($_GET["recherche"]) && !empty($_GET["recherche"])) {
              $saisie =$_GET["recherche"];
            //$requete= $bdd->query("SELECT * FROM CIS_bdpm where nomEvenement like '%". $saisie ."%' or createurEvenement like '%". $saisie ."%'");
            $requete= $bdd->query("SELECT * FROM CIS_bdpm where
              CODE_CIS like '%". $saisie ."%' or
              Nom_Medicament like '%". $saisie ."%' or
              Forme_Pharma like '%". $saisie ."%' or
              Voie_Admin like '%". $saisie ."%' or
              Etat_Commerce like '%". $saisie ."%' or
              Titulaire like '%". $saisie ."%' limit ". $limit
               );
            } else {
              $requete= $bdd->query("SELECT * FROM CIS_bdpm limit ". $limit);
            }

            $i = 0;

            print_r ($requete);



            while ($resultat = $requete->fetch()) {
              $i++;
           $CODE_CIS = $resultat["CODE_CIS"]; //
           $Nom_Medicament = $resultat["Nom_Medicament"]; //
           $Forme_Pharma = $resultat["Forme_Pharma"];
           $Voie_Admin = $resultat["Voie_Admin"];
           $Statut_Admin_AMM = $resultat["Statut_Admin_AMM"];
           $Type_Proced_AMM = $resultat["Type_Proced_AMM"];
           $Etat_Commerce = $resultat["Etat_Commerce"];
           $Date_AMM = $resultat["Date_AMM"];
           $Titulaire = $resultat["Titulaire"];
           $Surveille_Renforce = $resultat["Surveille_Renforce"];
             ?>

            <a href="presentation-medic.php?code_cis=<?php echo $CODE_CIS;?>">
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="text">
                    <p class="name"><?php echo $Nom_Medicament ?></p>
                      <span class="position">
                        Forme pharmaceutique : <?php  echo $Forme_Pharma; ?> <br>
                        Voie d'administration : <?php  echo $Voie_Admin; ?> <br>
                        Autorisation de Mise sur le marché : <?php  echo $Statut_Admin_AMM; ?> <br>
                        Procédure de mise sur le marché : <?php  echo $Type_Proced_AMM; ?> <br>
                      </span>
                    <br>
                    <p>Code CIS : <?php echo $CODE_CIS ?></p>
                    <p>Titulaire : <?php echo $Titulaire ?></p>
                  </div>
                </div>
              </div>
              </a>
              <br>
<?php
}
  ?>


  <div class="row mt-5">
    <div class="col text-center">
      <div class="block-27">
        <ul>
          <form method="get">
          <li><a href="medicaments.php?page=<?php echo $page-1; ?>&recherche=<?php echo $saisie?>">&lt;</a></li>
          <li class="active"><span><?php echo $page; ?></span></li>
          <li><a href="medicaments.php?page=<?php echo $page+1; ?>&recherche=<?php echo $saisie?>">&gt;</a></li>
          </form>
        </ul>
      </div>
    </div>
  </div>
          </div>
        </div>
      </div>
    </section>



<?php // echo $i; ?>


<?php
  include "element-page/footer.php";
 ?>
