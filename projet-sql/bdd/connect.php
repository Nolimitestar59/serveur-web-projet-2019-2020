<?php
    //delete connexion
  try {
      $bdd = new PDO("mysql:host=$host_name;dbname=$database", $user_name, $password);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
      }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }

?>
