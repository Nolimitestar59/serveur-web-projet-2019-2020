<?php

if (isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["prenom"]) && !empty($_POST["prenom"]) && isset($_POST["email"]) &&
!empty($_POST["email"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"]) && isset($_POST["mdp2"]) && !empty($_POST["mdp2"]) &&
isset($_POST["age"]) && !empty($_POST["age"]) &&
$_POST["mdp"] == $_POST["mdp2"]) {


  $nom = strval($_POST["nom"]);
  $prenom = $_POST["prenom"];
  $age = $_POST["age"];
  $email = $_POST["email"];
  $mdp = $_POST["mdp"];

 $sql = "INSERT INTO participant ( nom, prenom, age, email, password) VALUES ('". $nom . "', '". $prenom ."', '". $age ."', '". $email ."', '". $mdp ."')";


  $bdd->exec($sql);
  $bdd = null;

  $_SESSION["nom"] = $nom;
  $_SESSION["prenom"] = $prenom;

  echo "
  <SCRIPT LANGUAGE='JavaScript'>
  document.location.href='accueil-evenement';
  </SCRIPT>
  ";


}

 ?>
