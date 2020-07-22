<?php
    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {

    $email = htmlspecialchars($_POST["email"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
      $requete= $bdd->query("SELECT * FROM participant where email like '$email' and password like '$mdp' limit 1");
      if ($resultat = $requete->fetch()) {

                // on définie les variables par les valeurs récupéré dans la base de données
                 $id = htmlspecialchars($resultat["id"]);
                 $nom = htmlspecialchars($resultat["nom"]);
                 $prenom = htmlspecialchars($resultat["prenom"]);
                 $_SESSION["id"] = $id;
                 $_SESSION["nom"] = $nom;
                 $_SESSION["prenom"] = $prenom;

                  if (isset($_GET["id"]) && !empty($_GET["id"])) {
                    $id = $_GET["id"];
                    echo "
                    <SCRIPT LANGUAGE='JavaScript'>
                    document.location.href='presentation-evenement.php?id=$id';
                    </SCRIPT>
                    ";
                  } else {
                    echo "
                    <SCRIPT LANGUAGE='JavaScript'>
                    document.location.href='accueil-evenement';
                    </SCRIPT>
                    ";
                  }

               }

    }
 ?>
