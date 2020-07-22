<?php
if (isset($_SESSION["nom"]) && !empty($_SESSION["nom"]) && isset($_SESSION["prenom"]) && !empty($_SESSION["prenom"])) {
  $nom = $_SESSION["nom"];
  $prenom = $_SESSION["prenom"];
 ?>
     <!-- Header -->
       <header id="header">
         <nav class="left">
           <a href="#menu"><span>Menu</span></a>
         </nav>
         <a class="logo">Bonjour <?php echo $prenom ?> !</a>
         <nav class="right">
           <a href="createEvent.php" class="button alt" type="button" name="button">Créer un événement ?</a>
             <button onclick="deconnection();" class="button alt" type="button" name="button">Vous êtes connecter ✔</button>
         </nav>
       </header>

     <!-- Menu -->
       <nav id="menu">
         <ul class="links">
           <li><a href=".">Accueil</a></li>
           <li><a href="mes-evenements">Mes événements</a></li>
           <li><a href="accueil-evenement">Nos événements</a></li>
           <li><a href="ma-liste">Evenements Rejoinds</a></li>
           <li><a href="profil">Mon profil</a></li>
           <li><a href="#" onclick="deconnection();">Se Déconnecter</a></li>
         </ul>
       </nav>

<?php
} else {
  ?>
  <!-- Header -->
  <header id="header">
    <nav class="left">
      <a href="#menu"><span>Menu</span></a>
    </nav>
    <a class="logo">Bonjour à toi</a>
    <nav class="right">
      <a href="connexion" class="button alt">Connexion</a>
    </nav>
  </header>

<!-- Menu -->
  <nav id="menu">
    <ul class="links">
      <li><a href=".">Accueil</a></li>
      <li><a href="accueil-evenement">Nos événements</a></li>
      <li><a href="connexion">Se Connecter</a></li>
    </ul>
    <ul class="actions vertical">
      <li><a href="connexion" class="button fit">Connexion</a></li>
    </ul>
  </nav>
  <?php
}
?>
