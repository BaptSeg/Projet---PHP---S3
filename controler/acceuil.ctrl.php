<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

<<<<<<< HEAD

  $categorie = $bdd->getAllCategorie();
=======
  $categorie = $bdd->getCategorie();
>>>>>>> b853137773c0733c9e90e9a7ba2be26a1843e4b6

  $view = new View('accueil.view.php');
  $view->categorie = $categorie;
  $view->show();

?>
