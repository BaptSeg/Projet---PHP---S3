<?php
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

  $login_valide = $bdd->pseudo_exist($_POST['pseudo']);
  $pass_bdd = $bdd->getPass($_POST['pseudo']);
  if (($login_valide == $_POST['pseudo']) && password_verify($_POST['mdp'] , $pass_bdd)) {
    session_start();
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['mdp'] = $_POST['mdp'];
    // on redirige notre visiteur vers une page de notre section membre
    header ('location: ../view/test_connexion.php');
  }else {
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
    echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
  }
 ?>
