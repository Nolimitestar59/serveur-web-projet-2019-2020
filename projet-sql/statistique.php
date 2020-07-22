<?php
include "element-page/header.php";
require "./bdd/connect.php";
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <title>Statistiques</title>
</head>
<body>
<h1>Statistiques</h1>



<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
            <h2>Graphique 1 : Nombre de médicaments en fonction du taux de remboursement</h2>


            <canvas id="graph1" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graph1').getContext('2d');
                var graph1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [ <?php
                            require './bdd/connect.php';
                            $graph12 = $bdd->prepare("SELECT Taux_rembourse FROM CIS_CIP_bdpm GROUP BY Taux_rembourse");
                            $graph12->execute();
                            $graph12 = $graph12->fetchAll();
                            foreach ($graph12 as $value) {
                                if (empty($value["Taux_rembourse"])) {
                                    $value["Taux_rembourse"] = "0%";
                                }
                                echo '"' . $value["Taux_rembourse"] . '", ';
                            }
                            ?>],
                        datasets: [{
                            label: 'Nombre de médicaments en fonction du taux de remboursement ',
                            data: [
                              <?php
                                require './bdd/connect.php';
                                $graph11 = $bdd->prepare("SELECT COUNT(Taux_rembourse) FROM CIS_CIP_bdpm GROUP BY Taux_rembourse");
                                $graph11->execute();
                                $graph11 = $graph11->fetchAll();
                                foreach ($graph11 as $value) {
                                    if (empty($value["COUNT(Taux_rembourse)"])) {
                                        $value["COUNT(Taux_rembourse)"] = "0";
                                    }
                                    echo '"' . $value["COUNT(Taux_rembourse)"] . '", ';
                                }
                                ?>
                              ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
</div>






<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">

            <h2>Graphique 2 : Évolution de la commercialisation des médicaments dans le temps.</h2>


            <canvas id="graph2" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graph2').getContext('2d');
                var graph2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [

                            <?php
                            require './bdd/connect.php';
                            $graph22 = $bdd->prepare("SELECT RIGHT(Date_Declaration_Commerce, 4) FROM CIS_CIP_bdpm GROUP BY RIGHT(Date_Declaration_Commerce, 4) ORDER BY RIGHT(Date_Declaration_Commerce, 4) ASC");
                            $graph22->execute();
                            $graph22 = $graph22->fetchAll();
                            foreach ($graph22 as $value) {
                                echo '"' . $value["RIGHT(Date_Declaration_Commerce, 4)"] . '", ';

                            }
                            ?>
                        ],
                        datasets: [{
                            label: 'Évolution de la commercialisation des médicaments dans le temps. ',
                            data: [
                                <?php
                                require './bdd/connect.php';
                                $graph21 = $bdd->prepare("SELECT COUNT(RIGHT(Date_Declaration_Commerce, 4)) FROM CIS_CIP_bdpm GROUP BY RIGHT(Date_Declaration_Commerce, 4) ORDER BY RIGHT(Date_Declaration_Commerce, 4) ASC");
                                $graph21->execute();
                                $graph21 = $graph21->fetchAll();
                                foreach ($graph21 as $value) {
                                    echo '"'. $value["COUNT(RIGHT(Date_Declaration_Commerce, 4))"] . '", ';

                                }
                                ?>
                            ],
                            backgroundColor: [

                            ],
                            borderColor: [

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
</div>









<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">

            <h2>Graphique 3 : Nombre d’avis de l’ASMR pour une date</h2>


            <canvas id="graph3" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graph3').getContext('2d');
                var graph3 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            <?php
                            require './bdd/connect.php';
                            $graph31 = $bdd->prepare("SELECT LEFT(Date_Avis_Comission_, 4) FROM `CIS_HAS_ASMR_bdpm` GROUP BY LEFT(Date_Avis_Comission_, 4) ORDER BY LEFT(Date_Avis_Comission_, 4) ASC");
                            $graph31->execute();
                            $graph31 = $graph31->fetchAll();
                            foreach ($graph31 as $value) {
                                echo '"' . $value["LEFT(Date_Avis_Comission_, 4)"] . '", ';
                            }
                            ?>

                        ],
                        datasets: [{
                            label: 'Nombre d’avis de l’ASMR pour une date ',
                            data: [
                                <?php
                                require './bdd/connect.php';
                                $graph31 = $bdd->prepare("SELECT COUNT(LEFT(Date_Avis_Comission_, 4)) FROM CIS_HAS_ASMR_bdpm GROUP BY LEFT(Date_Avis_Comission_, 4) ORDER BY LEFT(Date_Avis_Comission_, 4) ASC");
                                $graph31->execute();
                                $graph31 = $graph31->fetchAll();
                                foreach ($graph31 as $value) {
                                    echo '"' . $value["COUNT(LEFT(Date_Avis_Comission_, 4))"] . '", ';
                                }
                                ?>

                            ],
                            backgroundColor: [

                            ],
                            borderColor: [

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
</div>







<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-9 shadow-lg p-3 mb-5 bg-white rounded">

            <h2>Graphique 4 : Taux de remboursement par rapport au prix du médicament</h2>


            <canvas id="graph4" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graph4').getContext('2d');
                var graph4 = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [

                            <?php
                            require './bdd/connect.php';
                            $graph41 = $bdd->prepare("SELECT Taux_rembourse FROM `CIS_CIP_bdpm` ORDER BY convert(Prix_medic_euro, decimal) ASC");
                            $graph41->execute();
                            $graph41 = $graph41->fetchAll();
                            foreach ($graph41 as $value) {
                                if(empty($value["Taux_rembourse"])){
                                    $value="0%";
                                }
                                echo '"' . $value["Taux_rembourse"] . '", ';
                            }
                            ?>

                        ],
                        datasets: [{
                            label: 'Taux de remboursement par rapport au prix du médicament',
                            data: [
                                <?php
                                require './bdd/connect.php';
                                $graph42 = $bdd->prepare("SELECT Prix_medic_euro FROM `CIS_CIP_bdpm`  ORDER BY convert(Prix_medic_euro, decimal) ASC");
                                $graph42->execute();
                                $graph42 = $graph42->fetchAll();
                                foreach ($graph42 as $value) {
                                    if(empty($value["Prix_medic_euro"])){
                                        $value="0";
                                    }
                                    echo '"' . $value["Prix_medic_euro"] . '", ';
                                }
                                ?>

                            ],

                            backgroundColor: [
                                'rgb(255, 99, 132)'
                            ],
                            borderColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
</div>





<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5 shadow-lg p-3 mb-5 bg-white rounded">

<h2>Graphique 5 : Résumé des médicaments commercialisé et non commercialisé</h2>


<canvas id="graph5" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById('graph5').getContext('2d');
    var graph5 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
              "commercialisé",
              "non commercialisé"
            ],
            datasets: [{
                label: 'Résumé des médicaments commercialisé et non commercialisé',
                data: [
                    <?php
                    require './bdd/connect.php';
                    $graph52 = $bdd->prepare("SELECT COUNT(Etat_Commerce) FROM `CIS_CIP_bdpm` WHERE Etat_Commerce != 'Déclaration de commercialisation'");
                    $graph52->execute();
                    $graph52 = $graph52->fetchAll();
                    foreach ($graph52 as $value) {

                        echo '"' . $value["COUNT(Etat_Commerce)"] . '", ';
                    }
                    ?>
                    <?php
                    require './bdd/connect.php';
                    $graph51 = $bdd->prepare("SELECT COUNT(Etat_Commerce) FROM `CIS_CIP_bdpm` WHERE Etat_Commerce = 'Déclaration de commercialisation'");
                    $graph51->execute();
                    $graph51 = $graph51->fetchAll();
                    foreach ($graph51 as $value) {

                        echo '"' . $value["COUNT(Etat_Commerce)"] . '", ';
                    }
                    ?>
                ],

                backgroundColor: [
                    'rgb(255, 99, 132)'
                ],
                borderColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</div>
</div>
</div>
</div>






</body>
</html>

<?php
include "element-page/footer.php";
?>
