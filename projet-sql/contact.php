<?php
    include "element-page/header.php";
 ?>

    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-3 bread">Contactez-nous </h1>
          </div>
        </div>
      </div>
    </div>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Information de Contact</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Adresse</span> 5 Avenue du Stade de France, 93210 Saint-Denis</p>
          </div>
          <div class="col-md-3">
            <p><span>Téléphone </span> <a href="tel://0155937000">01 55 93 70 00</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:contact.web@has-sante.fr">contact.web@has-sante.fr</a></p>
          </div>

        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>

          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>




    <?php
      include "element-page/footer.php";
     ?>
