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
      // on redirige notre visiteur vers une page de notre section membre
      $view = new View('accueil.view.php');
      $view->confirm = "Connexion reussi.";
      $view->show();
    } else {
      // echo '<body onLoad="alert(\'Membre non reconnu...\')">';
      // echo '<meta http-equiv="refresh" content="0;URL=../view/accueil.view.php">';
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
  $view -> show();

}
 ?>
