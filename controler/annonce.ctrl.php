<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);


  $resAnnonces = $bdd->rechercher($_POST['Categorie'], $_POST['Region'], 0, 20);

  $view = new View('annonce.view.php');
  $view->resAnnonces = $resAnnonces;
  $view->show();

?>
