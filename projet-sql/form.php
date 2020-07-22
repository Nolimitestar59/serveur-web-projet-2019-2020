<?php

include "element-page/header.php";
include "bdd/connect.php";

$req = $_GET['req'];

/** AFFICHAGE DU FORMULAIRE POUR REDIGER UN COMMENTAIRE **/
if ($req == "commentaire")
{
  $requete= $bdd->query("SELECT * FROM report");
  $content_select = '<option></option>';
  while ($resultat = $requete->fetch())
  {
    $id_report = $resultat['id'];
    $title_report = $resultat['title'];
    $content_select = $content_select.'<option value="'. $id_report .'">'.$title_report.'</option>';
 }
   $form = '
       <form action="bdd/action.php?req=comment" method="POST">
         <div class="form-group">
           <label for="name">Nom</label>
           <input type="text" class="form-control" name="name" placeholder="Entrez votre nom" required>
         </div>
         <div class="form-group">
           <label for="report">Selectionner un rapport</label>
           <select class="form-control" name="report" required>
             '.$content_select.'
           </select>
         </div>
         <div class="form-group">
           <label for="date">Date de l\'envoi</label>
           <input type="date" class="form-control" name="date" required>
         </div>
         <div class="form-group">
           <label for="date">Commentaire</label>
           <textarea class="form-control" name="content" rows="3" required></textarea>
         </div>
         <button class="btn btn-primary btn-sm" type="submit">Envoyer</button>
       </form>
       ';
}
/** AFFICHAGE DU FORMULAIRE POUR REDIGER UN RESULTAT **/
if ($req == "resultat")
{
  $requete= $bdd->query("SELECT * FROM study");
  $content_select = '<option></option>';
  while ($resultat = $requete->fetch())
  {
    $id_study = $resultat['id'];
    $title_study = $resultat['title'];
    $content_select = $content_select.'<option value="'. $id_study .'">'.$title_study.'</option>';
 }
 $form = '
     <form action="bdd/action.php?req=result" method="POST">
       <div class="form-group">
         <label for="name">Nom</label>
         <input type="text" class="form-control" name="name" placeholder="Entrez votre nom">
       </div>
       <div class="form-group">
         <label for="report">Selectionner une etude</label>
         <select class="form-control" name="study">
           '.$content_select.'
         </select>
       </div>
       <div class="form-group">
         <label for="title">Titre</label>
         <input type="text" class="form-control" name="title" placeholder="Entrez le titre de votre resultat">
       </div>
       <div class="form-group">
         <label for="exampleFormControlTextarea1">Contenu du resultat</label>
         <textarea class="form-control" name="content" rows="10"></textarea>
       </div>
       <button class="btn btn-primary btn-sm" type="submit">Envoyer</button>
     </form>
     ';
}
/** AFFICHAGE DU FORMULAIRE POUR REDIGER UNE note **/
if ($req == "note")
{
  $requete= $bdd->query("SELECT * FROM study");
  $content_select = '<option></option>';
  while ($resultat = $requete->fetch())
  {
    $id_study = $resultat['id'];
    $title_study = $resultat['title'];
    $content_select = $content_select.'<option value="'. $id_study .'">'.$title_study.'</option>';
 }
 $form = '
     <form action="bdd/action.php?req=note" method="POST">
       <div class="form-group">
         <label for="name">Nom</label>
         <input type="text" class="form-control" name="name" placeholder="Entrez votre nom">
       </div>
       <div class="form-group">
         <label for="name">Date de publication</label>
         <input type="date" class="form-control" name="date">
       </div>
       <div class="form-group">
         <label for="report">Selectionner une etude</label>
         <select class="form-control" name="study">
           '.$content_select.'
         </select>
       </div>
       <div class="form-group">
         <label for="exampleFormControlTextarea1">Contenu de la note</label>
         <textarea class="form-control" name="content" rows="4"></textarea>
       </div>
       <button class="btn btn-primary btn-sm" type="submit">Envoyer</button>
     </form>
     ';
}
/** AFFICHAGE DU FORMULAIRE POUR REDIGER UN RAPPORT **/
if ($req == "rapport")
{
  $requete= $bdd->query("SELECT * FROM study");
  $content_select = '<option></option>';
  while ($resultat = $requete->fetch())
  {
    $id_study = $resultat['id'];
    $title_study = $resultat['title'];
    $content_select = $content_select.'<option value="'. $id_study .'">'.$title_study.'</option>';
 }
 $form = '
     <form action="bdd/action.php?req=rapport" method="POST">
       <div class="form-group">
         <label for="name">Nom</label>
         <input type="text" class="form-control" name="name" placeholder="Entrez votre nom">
       </div>
       <div class="form-group">
         <label for="date">Date de publication</label>
         <input type="date" class="form-control" name="date">
       </div>
       <div class="form-group">
         <label for="title">Titre</label>
         <input type="text" class="form-control" name="title" placeholder="Entrez le titre du rapport">
       </div>
       <div class="form-group">
         <label for="report">Selectionner une etude</label>
         <select class="form-control" name="study">
           '.$content_select.'
         </select>
       </div>
       <div class="form-group">
         <label for="exampleFormControlTextarea1">Contenu du rapport</label>
         <textarea class="form-control" name="content" rows="8"></textarea>
       </div>
       <button class="btn btn-primary btn-sm" type="submit">Envoyer</button>
     </form>
     ';
}

?>

    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2">Edition</p>
            <h1 class="mb-3 bread">Rédiger votre <strong><?echo $req?></strong></h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Formulaire </h2>


            <?php
            //AFFICHAGE DU FORMULAIRE VOULU
            echo $form;

            ?>


          </div>
        </div>
        <div class="row d-flex">

    </div class>
      </div>
        </div>
        <div class="row mt-5">

      </div>
    </section>

    <?php
      include "element-page/footer.php";
     ?>
