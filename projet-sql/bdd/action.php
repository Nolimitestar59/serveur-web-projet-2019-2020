<?php

include "connect.php";
$req = $_GET['req'];


if (isset($_POST["date"]))
{
  $dateTAB = explode("-",$_POST["date"]);
  $date = $dateTAB[0]."-".$dateTAB[1]."-".$dateTAB[2];
}

/** TOUT LES TESTS POUR INSERER LES BONNES VALEURS DANS LA BONNE TABLE, EN FONCTION DU FORMULAIRE VOULU **/
htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
if ($req == "comment")
{
    $queryCOMMENTS="INSERT INTO comments (`id_report`, `author`, `content`, `date`) VALUES ( '".$_POST["report"]."', '".$_POST["name"]."', '".$_POST["content"]."' , '".$date."')";
    $bdd->exec($queryCOMMENTS);
}

if ($req == "note")
{
    $queryNOTE="INSERT INTO moredatas (`id_study`, `author`, `content`, `date_publication`) VALUES ( '".$_POST["study"]."', '".$_POST["name"]."', '".$_POST["content"]."' , '".$date."')";
    $bdd->exec($queryNOTE);
}

if ($req == "result")
{
    $queryRESULT="INSERT INTO result (`id_study`, `content`, `author`, `title`) VALUES ( '".$_POST["study"]."', '".$_POST["content"]."', '".$_POST["name"]."' , '".$_POST["title"]."')";
    $bdd->exec($queryRESULT);
}

if ($req == "rapport")
{
    $queryREPORT="INSERT INTO report (`id_etude`, `author`, `date_publication`, `content`, `title`) VALUES ( '".$_POST["study"]."', '".$_POST["name"]."', '".$date."', '".$_POST["content"]."' , '".$_POST["title"]."')";
    $bdd->exec($queryREPORT);
}

header('Location: ../etudes.php');
