<?php session_start();
// redirection vers la page admin si on est déjà connecté
if(isset($_SESSION["username"])){
  echo '<script>window.location.href="admin_home.php";</script>';
}
?>
<!-- en cours -->

<?php
  include "page/header.php";
 ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <body>

    <div class="container align-middle">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded">
          <!--<div class="text-center img"><img src="assets/images/coeur5.png" class="img-fluid" width="100" height="100" alt="coeur"></div>-->
          <form>
            <div class="form-group">
              <label for="user">Utilisateur</label>
              <input type="text" class="form-control" name="user" id="user" aria-describedby="user" placeholder="Pseudo" required>
              <!--<small id="usersmall" class="form-text text-muted">Nous ne partagerons jamais votre adresse mail </small>-->
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
          </form>

          <?php
          // Connection à la BD
          require './db/connectDB.php';

          // Récupération des identifiants entrés
          $username = $_GET['user'];
          $password = $_GET['password'];
          //echo "<br> user: ".$username;
          //echo "<br> password: ".$password;


          // Requête qui cherche l'utilisateur dans la BD
          $sql = $conn->prepare("SELECT * FROM users WHERE username = '$username' AND password= '$password'");
          $sql->execute();
          $row=$sql->fetch();
          $username_db = $row["username"];
          $password_db = $row["password"];
          //echo "<br> username db : ".$username_db;
          //echo "<br> password db : ".$password_db;

          // Comparaison identifiants entrés et ceux de la db
          if($username==$username_db && $password==$password_db){
            $_SESSION['username']=$username;
            //echo "<br> session :". $_SESSION["username"];
            //echo "<br> statut : Connecté en tant que ". $_SESSION["username"];
            //header('location: admin_home.php');
          }else{
          echo"<br> statut : Identifants incorrects";
          }

          if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
          echo '<script>window.location.href="admin_home.php";</script>';
          }
          ?>

        </div>
      </div>
    </div>

  </body>
<?php
  include "page/footer.php";
 ?>
