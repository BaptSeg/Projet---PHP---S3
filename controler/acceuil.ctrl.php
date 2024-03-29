<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

  $categorie = $bdd->getAllCategorie();                                      // Récuperation de la liste de catégorie et de region pour le formulaire
  $region = $bdd->getAllRegions();

  $view = new View('accueil.view.php');
  $view->categorie = $categorie;
  $view->region = $region;
  $view->show();


?>
