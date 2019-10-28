<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

  $annonce = $bdd->recupererAnnonce(2);
  $utilisateur = $bdd->recupererUtilisateur($annonce->utilisateur);

  $view = new View('annonce.view.php');
  $view->annonce = $annonce;
  $view->utilisateur = $utilisateur;
  $view->show();

?>
