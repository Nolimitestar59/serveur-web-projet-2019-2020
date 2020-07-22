<?php
include 'header.php';
?>
<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Statistiques</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row" style="display: block;">

                    <div>
                      <div id="graph1-title" class="graph_tittle"> Nombre de médicaments en fonction du taux de remboursement</div>
                      <div id="graph1" style="height: 250px;"></div><br>
                    </div>
                    <div>
                      <div id="graph2-title" class="graph_tittle"> Évolution de la commercialisation des médicaments dans le temps</div>
                      <div id="graph2" style="height: 250px;"></div><br>
                    </div>

                    <!--<div>
                      <div id="graph3-title" class="graph_tittle">  Nombre d’avis de l’ASMR</div>
                      <input type="date" id="dateASMR"   >
                      <div id="graph3" style="height: 250px;"></div><br>
                    </div>-->
                    <div>
                      <div id="graph5-title" class="graph_tittle">   médicaments commercialisé et non commercialisé</div>
                      <div id="graph5" style="height: 250px;"></div><br>
                  </div>
                  <div>
                      <div id="graph6-title" class="graph_tittle">   médicaments commercialisé et non commercialisé sous surveillance</div>
                      <div id="graph6" style="height: 250px;"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->

    <!-- Team End -->
    </main>
    <?php
    include 'footer.php';
    ?>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <style>
    .graph_tittle{
      text-align: center;

    }

    </style>
    <?php
    // graph1
    $requete = "SELECT `Taux_rembourse` as taux , COUNT(CODE_CIS) as nb_medicaments FROM `CIS_CIP_bdpm` GROUP BY `Taux_rembourse` ORDER BY `Taux_rembourse` DESC
";
    $result = mysqli_query($connect,$requete);
    while($row = mysqli_fetch_assoc($result)){
      $tab[] = $row;
    }
    foreach ($tab as $key => $value) {
      if($value['taux'] != ""){
        $data .= "{ label: 'taux : ".$value['taux']."', value: ".$value['nb_medicaments']." },";
      }else{
        $data .= "{ label: 'taux : 0%', value: ".$value['nb_medicaments']." }";
      }
    }
    echo "
      <script>
        new Morris.Donut({
          element: 'graph1',
          data: [".$data."]});
      </script>
    ";

    // fin graph1

    // graph2

    $requete2 = "SELECT RIGHT(Date_Declaration_Commerce, 4) as annee,COUNT(RIGHT(Date_Declaration_Commerce, 4)) as nb_medicaments FROM CIS_CIP_bdpm GROUP BY RIGHT(Date_Declaration_Commerce, 4) ORDER BY RIGHT(Date_Declaration_Commerce, 4) ASC ";
    $result2 = mysqli_query($connect,$requete2);
    while($row = mysqli_fetch_assoc($result2)){
      $tab2[] = $row;
    }
    //echo"<pre>";print_r($tab2);echo"</pre>";
    foreach ($tab2 as $key => $value) {
        $data2 .= "{ annee: '".$value['annee']."', value: ".$value['nb_medicaments']." },";
    }

    echo "<script>
      new Morris.Line({

      element: 'graph2',

      data: [".$data2."],
      xkey: 'annee',
      ykeys: ['value'],
      labels: ['nombre médicaments']
    });
    </script>";
    // fin graph2

    //graph3

    //fin graph3

    // graph4
    /*
    $requete4 = "SELECT `Taux_rembourse`,CONVERT(`Prix_medic_euro`, SIGNED INTEGER) FROM `CIS_CIP_bdpm`  ORDER BY CONVERT(`Prix_medic_euro`, SIGNED INTEGER) ASC";
    $result4 = mysqli_query($connect,$requete4);
    while($row = mysqli_fetch_assoc($result4)){
      $tab4[] = $row;
    }
    echo"<pre>";print_r($tab4);echo"</pre>";
    foreach ($tab4 as $key => $value) {


    }
    */
    //fin graph4
    //graph5
    $requete5 = "SELECT COUNT(*) as nombre,`Etat_Commerce` FROM `CIS_bdpm` GROUP BY `Etat_Commerce`";
    $result5 = mysqli_query($connect,$requete5);
    while($row = mysqli_fetch_assoc($result5)){
      $tab5[] = $row;
    }
    foreach ($tab5 as $key => $value) {

        $data5 .= "{ label: '".$value['Etat_Commerce']."', value: ".$value['nombre']." },";

    }
    //echo"<pre>";print_r($tab5);echo"</pre>";
    echo "
      <script>
        new Morris.Donut({
          element: 'graph5',
          data: [".$data5."]});
      </script>
    ";

    //fin graph 5
    //graph6

    $requete6 = "SELECT COUNT(*) as nombre,`Etat_Commerce` FROM `CIS_bdpm` WHERE`Surveille_Renforce` ='oui' GROUP BY `Etat_Commerce`";
    $result6 = mysqli_query($connect,$requete6);
    while($row = mysqli_fetch_assoc($result6)){
      $tab6[] = $row;
    }
    foreach ($tab6 as $key => $value) {

        $data6 .= "{ label: '".$value['Etat_Commerce']."', value: ".$value['nombre']." },";


    }
    //echo"<pre>";print_r($tab6);echo"</pre>";
    echo "
      <script>
        new Morris.Donut({
          element: 'graph6',
          data: [".$data6."]});
      </script>
    ";

    //fin graph 6

    ?>

    <!-- JS here -->




<script>
  $(document).ready(function(){
    $("#dateASMR").on('change',function(event){
      var date = $('#dateASMR').val();
      $.ajax({
          url : 'asyncform.php',
          method : 'POST',
          data : {
            DateASMR : date
          },
        success : function(data){
          if(data != 'false'){

          }
        }
      });
    });
  });
</script>


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
