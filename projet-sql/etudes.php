     <?php
         include "element-page/header.php";
         include 'bdd/connect.php';


      ?>

         <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
           <div class="overlay"></div>
           <div class="container">
             <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
               <div class="col-md-8 ftco-animate text-center">
                 <p class="breadcrumbs"><span class="mr-2">Découvrer nos Etudes</p>
                 <h1 class="mb-3 bread">Etudes</h1>
               </div>
             </div>
           </div>
         </div>



         <section class="ftco-section bg-light">
           <div class="container">
             <div class="row justify-content-center mb-5 pb-3">
               <div class="col-md-7 heading-section ftco-animate text-center">
                 <h2 class="mb-4">Nos récentes études </h2>
               </div>
             </div>
             <div class="row d-flex">
               <?php
               $requete= $bdd->query("SELECT * FROM study limit 10");

               while ($resultat = $requete->fetch())
               {

                $Code_study = $resultat["id"];
                $title = $resultat["title"];
                $description = $resultat["description"];
                $author = $resultat["author"];
                $date = $resultat["date"];

                echo
                    '
                    <div class="col-md-6 ftco-animate">
                      <div class="blog-entry align-self-stretch d-flex">

                        <a href="presentation-etude?cs='.$Code_study.'" class="block-20 order-md-last" style="background-image: url(\'images/image_'.$Code_study.'.jpg\');">
                        <div class="text p-4 d-block">
                         <div class="meta mb-3">
                            <div><a href="presentation-etude?cs='.$Code_study.'">'.$date.'</a></div>
                            <div><a href="presentation-etude?cs='.$Code_study.'">écrit par : '.$author.'</a></div>
                            <!--<div><a href="presentation-etude?cs='.$Code_study.'" class="meta-chat"><span class="icon-chat"></span> 3</a></div>-->
                          </div>
                          <h3 class="heading mt-3"><a href="presentation-etude?cs='.$Code_study.'">'.$title.'</a></h3>
                          <p>'.$description.'</p>
                        </div>
                      </div>
                    </div>
                    ';


               }

               ?>
         </div class>
           </div>
             </div>
             <div class="row mt-5">

           </div>
         </section>

         <?php
           include "element-page/footer.php";
          ?>
