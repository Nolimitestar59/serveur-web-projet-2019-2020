<?php
session_start();
include "page/header.php";
// redirection vers la page de connexion si on est pas déjà connecté
if (isset($_SESSION["username"])) {
} else {
    echo '<script>window.location.href="connexion.php";</script>';
}
?>

<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Espace administrateur</title>
</head>

<body>
<h1>Espace administrateur</h1>
Connecté en tant que <?php echo $_SESSION["username"]; ?>

<!-- Bouton de déconnexion -->
<a href="logout.php" class="btn btn-primary">Déconnexion</a>

<!--Ajouter une liaison-->
<!--Formulaire de saisie pour ajouter une lisaison-->
<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded">
            <h2>Ajouter une liaison</h2>
            <small>Pour ajouter des liaisons inexistantes</small>
            <br><br>
            <form>

                <div class="form-group">
                    <label for="portDepart">Port de départ</label>
                    <select id="portDepart" name="portDepart">
                        <option value="Quiberon">Quiberon</option>
                        <option value="Le Palais">Le Palais</option>
                        <option value="Sauzon">Sauzon</option>
                        <option value="Vannes">Vannes</option>
                        <option value="Port St Gildas">Port St Gildas</option>
                        <option value="Lorient">Lorient</option>
                        <option value="Port-Tudy">Port-Tudy</option>
                        <option value="Quiberon bis">Quiberon</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="portArrivee">Port d'arivée</label>
                    <select id="portArrivee" name="portArrivee">
                        <option value="Quiberon">Quiberon</option>
                        <option value="Le Palais">Le Palais</option>
                        <option value="Sauzon">Sauzon</option>
                        <option value="Vannes">Vannes</option>
                        <option value="Port St Gildas">Port St Gildas</option>
                        <option value="Lorient">Lorient</option>
                        <option value="Port-Tudy">Port-Tudy</option>
                        <option value="Quiberon bis">Quiberon</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="disance">Distance</label>
                    <input type="text" class="form-control" name="distance" id="distance" placeholder="Distance"
                           required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ajouter la liaison</button>
                </div>

            </form>

            <?php
            //Récupération du formulaire dans des variables
            require './db/connectDB.php';

            //réinitialisation des variables
            $idportDepart = "";
            $idportArrive = "";
            $distance = "";
            $idsecteur = "";
            $code = "";

            //id port depart en fonction du nom de port
            $idportDepart = $_GET["portDepart"];
            switch ($idportDepart) {
                case "Quiberon":
                    $idportDepart = 1;
                    break;
                case "Le Palais":
                    $idportDepart = 2;
                    break;
                case "Sauzon":
                    $idportDepart = 3;
                    break;
                case "Vannes":
                    $idportDepart = 4;
                    break;
                case "Port St Gildas":
                    $idportDepart = 5;
                    break;
                case "Lorient":
                    $idportDepart = 6;
                    break;
                case "Port-Tudy":
                    $idportDepart = 7;
                    break;
                case "Quiberon bis":
                    $idportDepart = 8;
                    break;
            }

            //id port arrivée en fonction du nom de port
            $idportArrivee = $_GET["portArrivee"];
            switch ($idportArrivee) {
                case "Quiberon":
                    $idportArrivee = 1;
                    break;
                case "Le Palais":
                    $idportArrivee = 2;
                    break;
                case "Sauzon":
                    $idportArrivee = 3;
                    break;
                case "Vannes":
                    $idportArrivee = 4;
                    break;
                case "Port St Gildas":
                    $idportArrivee = 5;
                    break;
                case "Lorient":
                    $idportArrivee = 6;
                    break;
                case "Port-Tudy":
                    $idportArrivee = 7;
                    break;
                case "Quiberon bis":
                    $idportArrivee = 8;
                    break;
            }

            // secteur en fonction du port
            $secteur = $_GET["portDepart"];
            switch ($secteur) {
                case "Quiberon":
                    $secteur = "Belle-Ile-en-Mer";
                    break;
                case "Le Palais":
                    $secteur = "Belle-Ile-en-Mer";
                    break;
                case "Sauzon":
                    $secteur = "Belle-Ile-en-Mer";
                    break;
                case "Vannes":
                    $secteur = "Belle-Ile-en-Mer";
                    break;
                case "Port St Gildas":
                    $secteur = "Houat";
                    break;
                case "Lorient":
                    $secteur = "Ile de Groix";
                    break;
                case "Port-Tudy":
                    $secteur = "Ile de Groix";
                    break;
                case "Quiberon bis":
                    $secteur = "Houat";
                    break;
            }
            // id secteur en fonction du nom de port
            $idsecteur = $_GET["portDepart"];
            switch ($idsecteur) {
                case "Quiberon":
                    $idsecteur = 1;
                    break;
                case "Le Palais":
                    $idsecteur = 1;
                    break;
                case "Sauzon":
                    $idsecteur = 1;
                    break;
                case "Vannes":
                    $idsecteur = 1;
                    break;
                case "Port St Gildas":
                    $idsecteur = 2;
                    break;
                case "Lorient":
                    $idsecteur = 3;
                    break;
                case "Port-Tudy":
                    $idsecteur = 3;
                    break;
                case "Quiberon bis":
                    $idsecteur = 2;
                    break;
            }

            $code = $idportDepart . $idportArrivee;
            $distance = $_GET["distance"];

            // test de transformation des valeurs en nombres

            //  echo "<br>id port depart = ",$idportDepart,
            //  "<br>id port arrivée = ",$idportArrivee,
            //  "<br>distance = ", $distance,
            //  "<br>id secteur = ",$idsecteur,
            //  "<br>code = ", $code;

            // insertion dans la BDD
            if (isset($distance)) {
                $sql = "INSERT INTO liaison (code, distance, idportDepart, idsecteur, idportArrive) VALUES ('$code', '$distance', '$idportDepart', '$idsecteur', '$idportArrivee')";
                $conn->exec($sql);
                $conn = null;
            }
            ?>
        </div>
    </div>
</div>


<!--Statistiques-->


<!-- Chiffre d'affaires -->
<!-- A chaque paiment, le prix est envoyé dans la table "statistiques" depuis paiement.php
    Ici, on récupère cette table et on calcule la somme totale pour avoir le chiffre d'affaires-->
<div class="container align-middle">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded">
            <h2>Statistiques</h2>
            <small>Résultats depuis le début</small>

            <?php
            require './db/connectDB.php';
            //récupération de la somme des montants payés
            echo "<br><br>Chiffre d'affaires : ";
            $sql_ca = $conn->prepare("SELECT SUM(CA) from statistiques");
            $sql_ca->execute();
            $row_ca = $sql_ca->fetch();
            $result_ca = $row_ca["SUM(CA)"];
            echo $result_ca . "€ <br> Nombre total d'adultes : ";
            // nombre d'adultes
            $sql_adulte = $conn->prepare("SELECT SUM(nb_adulte) from statistiques");
            $sql_adulte->execute();
            $row_adulte = $sql_adulte->fetch();
            $result_adulte = $row_adulte["SUM(nb_adulte)"];
            echo $result_adulte . "<br> Nombre total de juniors : ";
            // nombre de juniors
            $sql_junior = $conn->prepare("SELECT SUM(nb_junior) from statistiques");
            $sql_junior->execute();
            $row_junior = $sql_junior->fetch();
            $result_junior = $row_junior["SUM(nb_junior)"];
            echo $result_junior . "<br> Nombre total d'enfants : ";
            // nombre d'enfants
            $sql_enfant = $conn->prepare("SELECT SUM(nb_enfant) from statistiques");
            $sql_enfant->execute();
            $row_enfant = $sql_enfant->fetch();
            $result_enfant = $row_enfant["SUM(nb_enfant)"];
            echo $result_enfant . "<br> Nombre total de passagers : ";
            // total de passagers
            $sql_total = $conn->prepare("SELECT SUM(nb_adulte + nb_enfant + nb_junior) FROM statistiques");
            $sql_total->execute();
            $row_total = $sql_total->fetch();
            $result_total = $row_total["SUM(nb_adulte + nb_enfant + nb_junior)"];
            echo $result_total . "<br><br><br>";
            ?>


            <!-- graphique camembert -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
            <canvas id="categorie" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('categorie').getContext('2d');
                var categorie = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Nombre adultes", "Nombre de juniors", "Nombre d'enfants"],
                        datasets: [{
                            label: 'Répartition de passagers par catégories',
                            data: [<?php echo $result_adulte; ?>, <?php echo $result_junior; ?>, <?php echo $result_enfant; ?>],
                            // couleurs
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 2
                        }]
                    },

                    options: {

                        title: {
                            display: true,
                            text: 'Grapique de la répartition des passagers par catégorie'
                        }
},


                });
            </script>






<!-- graphique ligne nombre total de passagers -->
            <canvas id="graphiqueTotal" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graphiqueTotal').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    // insersion des données dans le graphique
                    data: {
                        labels: [
                          // récupération des dates par une requete sql
                          <?php
                          require './db/connectDB.php';
                          $sql_date_now = $conn->prepare("SELECT traversee.date FROM enregistrer, traversee WHERE enregistrer.numreservation = traversee.num ORDER BY traversee.date ASC");
                          $sql_date_now->execute();
                          $row_date_now = $sql_date_now->fetchAll();

                        foreach ($row_date_now as $value) {
                            echo '"'.$value["date"].'", ';
                        }
                          ?>
                        ],
                        datasets: [{
                            label: "Nombre",
                            backgroundColor: 'lightblue',
                            borderColor: 'black',
                            data: [
                              <?php

                            //  foreach (  $row_date_now as  $value) {
                              // echo $result_total.', ';

                              $sql_date_now = $conn->prepare("SELECT enregistrer.quantite FROM enregistrer, traversee WHERE enregistrer.numreservation = traversee.num");
                              $sql_date_now->execute();
                              $row_date_now = $sql_date_now->fetchAll();
                              foreach ($row_date_now as $value){
                                echo '"'.$value["quantite"].'", ';
                              }


                              ?>
                            ],
                        }]
                    },

                    //  options
                    options: {
                        layout: {
                            padding: 5,
                        },
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Grapique du nombre total de passagers'
                        },
                        scales: {
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Nombre'
                                }
                            }],
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Date'
                                }
                            }]
                        }
                    }
                });
            </script>

<!---------------------------------------->

<!-- graphique chiffre d'affaires -->
            <canvas id="graphiqueCA" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById('graphiqueCA').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    // insersion des données dans le graphique
                    data: {
                        labels: [
                          // récupération des dates par une requete sql
                          <?php
                          require './db/connectDB.php';
                          $sql_date_now = $conn->prepare("SELECT DISTINCT date_now from statistiques");
                          $sql_date_now->execute();
                          $row_date_now = $sql_date_now->fetchAll();

                        foreach ($row_date_now as $value) {
                            echo '"'.$value["date_now"].'", ';
                        }
                          ?>
                        ],
                        datasets: [{
                            label: "Chiffre d'affaires",
                            backgroundColor: 'lightblue',
                            borderColor: 'black',
                            data: [
                              <?php


                              $sql_date_now = $conn->prepare("SELECT DISTINCT date_now,  CA from statistiques");
                              $sql_date_now->execute();
                              $row_date_now = $sql_date_now->fetchAll();
                              foreach ($row_date_now as $value){
                                echo '"'.$value["CA"].'", ';
                              }


                              ?>
                            ],
                        }]
                    },

                    //  options
                    options: {
                        layout: {
                            padding: 5,
                        },
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Grapique du Chiffre d\'affaires'
                        },
                        scales: {
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Chiffre d\'affaires par jour'
                                }
                            }],
                            xAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Date'
                                }
                            }]
                        }
                    }
                });
            </script>

        </div>
    </div>
</div>






</body>
</html>

<?php
include "page/footer.php";
?>
