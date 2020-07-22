<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <?php require './db/connectDB.php'; ?>
  <body>
    <div>
      <p>selectionnez la liaison : </p>
      <p>selectionnez la traversée : </p>
    </div>
    <form method="post" action="" >
       <p>Nom : <input type="text" name="nom" required/></p>
       <p>Adresse : <input type="text" name="adr" required/></p>
       <p>Code postal : <input type="text" name="cp" required/></p>
       <p>Ville : <input type="text" name="ville" required/></p>
       <div class="limiter">
         <div class="container-table100">
           <div class="wrap-table100">
             <div class="table100">
               <table>
                 <thead>
                   <tr class="table100-head">
                     <th class="column1">Adulte</th>
                     <th class="column2">Junior 8 à 18 ans</th>
                     <th class="column3">enfant de 0 à 7 ans</th>
                     <th class="column4">Voiture long.inf.4m</th>
                     <th class="column6">Voiture long.inf.5m</th>
                     <th class="column1">Fourgon</th>
                     <th class="column1">Camping car</th>
                     <th class="column1">Camion</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr class="table100-head">
                     <td> <input type="number" name="adulte" required/></td>
                     <td> <input type="number" name="junior" required/></td>
                     <td> <input type="number" name="enfant" required/></td>
                     <td> <input type="number" name="voitInf" required/></td>
                     <td> <input type="number" name="voitSup" required/></td>
                     <td> <input type="number" name="fourgon" required/></td>
                     <td> <input type="number" name="camping" required/></td>
                     <td> <input type="number" name="camion" required/></td>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
       <p><input id="onyva" type="submit" value="OK" ></p>
    </form>
  </body>
</html>


<?php
$sqlreservation = 'SELECT num FROM `reservation` order by num DESC limit 1';
$reqreservation = $conn->query($sqlreservation);
while ($resultat = $reqreservation->fetch()) {
   $numreservation = $resultat["num"];
}

$numreservation +=1;
$codeliaison = $_GET["codeliaison"];
$numtraversee = $_GET["numtraversee"];
$date = $_GET["date"];
$heure = $_GET["heure"];
$lieudepart = $_GET["lieudepart"];
$destination = $_GET["destination"];

 if (isset($_POST['nom']) AND isset($_POST['adr']) AND isset($_POST['cp']) AND isset($_POST['ville']) AND isset($_POST['adulte']) AND isset($_POST['junior']) AND isset($_POST['enfant']) AND isset($_POST['voitInf']) AND isset($_POST['voitSup']) AND isset($_POST['fourgon']) AND isset($_POST['camping']) AND isset($_POST['camion'])){
  echo "
  <script type=\"text/javascript\">
       document.location.href=\"paiement?codeliaison=".$codeliaison."&numtraversee=".$numtraversee."&numreservation=".$numreservation."&date=".$date."&heure=".$heure."&lieudepart=".$lieudepart."&destination=".$destination."\";
  </script>";
 }



// ajoute les informations à la table reservation
if (isset($_POST['nom']) AND isset($_POST['adr']) AND isset($_POST['cp']) AND isset($_POST['ville'])){
  $sqlres = "INSERT INTO reservation values ('$numreservation', ?, ?, ?, ?, $numtraversee)";
  $requete = $conn->prepare($sqlres);
  $requete->execute(array($_POST['nom'], $_POST['adr'], $_POST['cp'], $_POST['ville']));
}

//recupère le numéro de la réservation selon le nom de la réservation
$nom = $_POST['nom'];
$sqlnum = "SELECT num from reservation where nom=\"$nom\"";
$requete= $conn->query($sqlnum);
while ($resultat = $requete->fetch()) {
   $num= $resultat["num"];
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['adulte'])){
  $sqlcat = "SELECT num from type where libellé = 'Adulte'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['adulte']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['junior'])){
  $sqlcat = "SELECT num from type where libellé = 'Junior 8 à 18 ans'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['junior']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['enfant'])){
  $sqlcat = "SELECT num from type where libellé = 'enfant de 0 à 7 ans'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['enfant']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['voitInf'])){
  $sqlcat = "SELECT num from type where libellé = 'Voiture long.inf.4m'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['voitInf']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['voitSup'])){
  $sqlcat = "SELECT num from type where libellé = 'Voiture long.inf.5m'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['voitSup']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['fourgon'])){
  $sqlcat = "SELECT num from type where libellé = 'Fourgon'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['fourgon']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['camping'])){
  $sqlcat = "SELECT num from type where libellé = 'Camping car'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['camping']));
}

//récupère le numérotype selon la catégorie du type et ajoute les informations dans la table enregistrer
if (isset($_POST['camion'])){
  $sqlcat = "SELECT num from type where libellé = 'camion'";
  $requete = $conn->query($sqlcat);
  while ($resultat = $requete->fetch()) {
     $cat= $resultat["num"];
  }
  $sql = "INSERT INTO enregistrer values ('$cat', $num, ?)";
  $requete = $conn->prepare($sql);
  $requete->execute(array($_POST['camion']));
}
?>
