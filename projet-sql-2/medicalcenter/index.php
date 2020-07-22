<?php
include 'header.php';
?>
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>La voie du succès</span>
                                <h1 class="cd-headline letters scale">On tient compte de
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">Votre santé,</b>
                                        <b> de vos sushis</b>
                                        <b>et de votre steaks</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Bienvenue sur notre site présentant le projet SQL 2020</p>
                                <a href="medicaments.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Medicaments <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>La voie du succès</span>
                                <h1 class="cd-headline letters scale">on tient compte de
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">Votre santé</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Bienvenue sur notre site présentant le projet SQL 2020</p>
                                <a href="medicament.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Médicament <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
      <div class="whole-wrap">
        <div class="container box_1170">
          <div class="section-top-border">
            <div class="section-tittle text-center mb-100">
              <span>Statistiques</span>
              <h2>Quelques Statistiques concernant les Médicaments présentés : </h2>
            </div>
            <div class="col-md-9 mt-sm-20">
              <p> <b> Nombre total de médicaments : </b> <?php echo $total ?> </p>
              <p> <b> Nombre de médicaments commercialisés :  </b><?php echo $NbCommerce ?> </p>
              <p> <b> Nombre de médicaments sous surveillance renforcée et commercialisés : </b><?php echo $CommerceSurveille ?> </p>
              <p> <b> Nombre de médicaments ayant un niveau 5 d’ASMR : </b> <?php echo $ASMR ?> </p>
              <p> <b> Prix moyen des médicaments : </b> <?php echo round($PrixMoyen,2) ?> €</p>
              <p> <b> Prix et nom du Médicaments le plus cher : </b> <?php echo round($PrixMax,2) ?> € <p>
              <p> <b> Pourcentage moyen de Remboursement des médicaments </b> <?php echo round($TauxRemboursement,0) ?> % </p>
              <p> <b> Pour voir plus de Statistiques : </b> <p>
              <a href="stats.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Statistiques <i class="ti-arrow-right"></i></a>
              <p> <b> pour voir et rechercher les médicaments </b> </p>
              <a href="medicament.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Médicament <i class="ti-arrow-right"></i></a>

            </div>

          </div>
          </div>

    </div>
    <!-- About  End-->
    <!--? department_area_start  -->




    <!-- depertment area end  -->
     <!--? Gallery Area S
    <!--All startups End -->
     <!--? Team Start -->
     <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Doctors</span>
                        <h2>Our Specialist</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Antoine Lecomte</a></h3>
                            <span>Creative UI Designer</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team3.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Kelian Danquiny</a></h3>
                            <span>Agency Manager</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/img/gallery/team1.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Gregory Grenot</a></h3>
                            <span>Designer</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
     <!--? Contact form Start -->
    
    <!-- Blog End -->
    </main>
    <?php
    include 'footer.php';
    ?>

    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    </body>
</html>
