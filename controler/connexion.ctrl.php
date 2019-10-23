<?php
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);
if (isset($_POST['connexion'])) {
  $login_valide = $bdd->pseudo_exist($_POST['pseudo']);
  if (!empty($login_valide)) {
    $pass_bdd = $bdd->getPass($_POST['pseudo']);
    $pseudo_low = strtolower($_POST['pseudo']);
    if (password_verify($_POST['mdp'] , $pass_bdd['mdp'])) {
      session_start();
      $_SESSION['pseudo'] = $pseudo_low;
      $_SESSION['mdp'] = $_POST['mdp'];
      // on redirige notre visiteur vers une page de notre section membre
      header ('location: ../view/accueil.view.php');
    } else {
      // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
      echo '<body onLoad="alert(\'Membre non reconnu...\')">';
      // puis on le redirige vers la page d'accueil
      echo '<meta http-equiv="refresh" content="0;URL=../view/accueil.view.php">';
      $view = new View('connexion.view.php');
      $view->erreur = "Mot de passe incorrect(s) !";
      $view->show();
    }
  } else {
    $view = new View('connexion.view.php');
    $view->erreur = "Identifiant non reconnu !";
    $view -> show();
  }
} else{
  $view = new View('connexion.view.php');
  $view->erreur = "ok";
  $view->toto = "toto";
  $view -> show();

}
 ?>
