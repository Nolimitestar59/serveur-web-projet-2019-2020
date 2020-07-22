<?php
    include "element-page/header.php";
    include "bdd/connect.php";
    $code_study = $_GET["cs"];
    $checker = 0;

    $requete= $bdd->query("SELECT * FROM study");
    while ($resultat = $requete->fetch())
    {
      if ($_GET["cs"] == $resultat["id"])
      {
        $title = $resultat["title"];
        $description = $resultat["description"];
        $author = $resultat["author"];
        $date = $resultat["date"];
        $resume = $resultat["resume"];
      }
   }


//DONNEES POUR LES RAPPORTS
$requete3= $bdd->query("SELECT * FROM report");


//DONNEES POUR LES NOTES
$requete4= $bdd->query("SELECT * FROM moredatas WHERE id_study = ".$code_study);

//DONNEES POUR LES RESULTAT
$requete5= $bdd->query("SELECT * FROM result WHERE id_study = ".$code_study);


 ?>

    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?echo $resume?></p>
            <h1 class="mb-3 bread"><?echo $title ?></h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Rapport(s) de l'étude</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div id="accordion">
              <div class="row">
                <div class="col-md-12">

                  <?php
                  $i=1;
                  while ($resultat3 = $requete3->fetch())
                  {

                    if ($_GET["cs"] == $resultat3["id_etude"])
                    {
                      $content = $resultat3["content"];
                      $author_report = $resultat3["author"];
                      $date_upload = $resultat3["date_publication"];
                      $code_report = $resultat3["id"];
                      $title_report = $resultat3['title'];
                      $checker = 1;



                      echo '
                      <div class="card">
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse"  href="#menu-'.$i.'" aria-expanded="false" aria-controls="menu-'.$i.'">Rapport de l\'étude : '.$title_report.'<small>'.$title.'</small><span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
                        </div>
                        <div id="menu-'.$i.'" class="collapse">
                          <div class="card-body">

                            <span class="badge badge-info"> Code du rapport : '.$code_report.'</span>&nbsp;&nbsp;&nbsp;<span class="badge badge-info"> Date de publication : '.$date_upload.'</span>&nbsp;&nbsp;&nbsp;<span class="badge badge-info"> Auteur : '.$author_report.'</span>
                            <p></p>
                            <h4>Sujet de ce rapport : '.$title_report.'</h4>
                            <br>
                            <p>'.$content.'</p>
                          </div>
                        <h4>&nbsp;&nbsp;&nbsp;Commentaires</h4>

                        <ul class="comment-list">

                          ';
                          $i++;
                          $requete2= $bdd->query("SELECT * FROM comments WHERE id_report = ".$code_report);
                           if ($checker == 0)
                           {
                             $content = "aucunes données";
                             $author_report = "aucunes données";
                             $date_upload = "aucunes données";
                             $code_report = "aucunes données";
                           }
                              while ($resultat2 = $requete2->fetch())
                              {

                                  $content_comment = $resultat2["content"];
                                  $author_comment = $resultat2["author"];
                                  $date_comment = $resultat2["date"];
                                  $code_comment = $resultat2["id_report"];
                                  if ($code_comment == $code_report)
                                  {
                                  echo '
                                        <li class="comment">
                                          <div class="vcard bio">

                                          </div>
                                          <div class="comment-body">
                                            <h3>'.$author_comment.'</h3>
                                            <div class="meta">écrit le '.$date_comment.'</div>
                                            <p>'.$content_comment.'</p>
                                          </div>
                                        </li>
                                      ';
                                    }
                             }

                             echo '
                        </ul>

                        </div>
                        <button onclick="redirection(`rapport`);" type="button" class="btn btn-outline-primary btn-sm">Rédiger un rapport</button>

                        <script type="text/javascript">
                        function redirection(request){
                          document.location.href="form.php?req="+ request;
                        }
                        </script>

                        <p></p>
                        <button onclick="redirection(`commentaire`);" type="button" class="btn btn-outline-primary btn-sm">Rédiger un commentaire</button>
                      </div>
                            ';

                    }

                 }
                 ?>


                  <br>


                  <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                      <h2 class="mb-4">Note(s) d'information</h2>
                    </div>
                  </div>

                <?php
                $n = 20;
                  while ($resultat4 = $requete4->fetch())
                  {
                      $content_moredatas = $resultat4["content"];
                      $author_moredatas = $resultat4["author"];
                      $date_moredatas = $resultat4["date_publication"];
                      $code_moredatas = $resultat4["id"];


                  echo '
                  <div class="card">
                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse"  href="#menu-'.$n.'" aria-expanded="false" aria-controls="menu-'.$n.'">Note d\'information supplémentaire de l\'étude <small>'.$title.'</small> <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
                    </div>
                    <div id="menu-'.$n.'" class="collapse">
                      <div class="card-body">
                        <span class="badge badge-info"> Code de la note : '.$code_moredatas.'</span>&nbsp;&nbsp;&nbsp;<span class="badge badge-info"> Date de publication : '.$date_moredatas.'</span>&nbsp;&nbsp;&nbsp;<span class="badge badge-info"> Auteur : '.$author_moredatas.'</span>
                        <p></p>
                        <p>'.$content_moredatas.'</p>
                      </div>
                    </div>
                    <button onclick="redirection(`note`);" type="button" class="btn btn-outline-primary btn-sm">Rédiger une note</button>
                  </div>
                  ';
                  $n++;
                  }
                ?>
                  <br>

                  <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                      <h2 class="mb-4">Resultat(s) d'étude</h2>
                    </div>
                  </div>

                  <?php
                  $r = 10;
                  while ($resultat5 = $requete5->fetch())
                  {
                      $content_result = $resultat5["content"];
                      $author_result = $resultat5["author"];
                      $title_result = $resultat5["title"];
                      $code_result = $resultat5["id"];


                 echo '
                  <div class="card">
                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse"  href="#menu-'.$r.'" aria-expanded="false" aria-controls="menu-'.$r.'">Resultat de l\'étude <small>'.$title.'</small> <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
                    </div>
                    <div id="menu-'.$r.'" class="collapse">
                      <div class="card-body">
                        <span class="badge badge-info"> Code du resultat : '.$code_result.'</span>&nbsp;&nbsp;&nbsp;<span class="badge badge-info"> Auteur : '.$author_moredatas.'</span>
                        <div class="row justify-content-center mb-5 pb-3">
                          <div class="col-md-7 heading-section ftco-animate text-center">
                            <h2 class="mb-4">'.$title_result.'</h2>
                          </div>
                        </div>
                        <p></p>
                        <p>'.$content_result.'</p>
                      </div>
                    </div>
                    <button onclick="redirection(`resultat`);" type="button" class="btn btn-outline-primary btn-sm">Rédiger un resultat</button>
                  </div>
                  ';
                  $r++;
                  }
                  ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <?php
      include "element-page/footer.php";
     ?>
