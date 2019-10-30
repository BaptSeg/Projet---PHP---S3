<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');
  require_once('../model/Annonce.class.php');
  require_once('../model/utilisateur.class.php');
  $bdd = new DAOClass($config['database_path']);

  $annonce = $bdd->recupererAnnonceID($_GET['idAnnoncce']);
  $utilisateur = $bdd->recupererUtilisateur($annonce->getUtilisateur());

  $view = new View('annonce.view.php');
  $view->annonce = $annonce;
  $view->utilisateur = $utilisateur;
  $view->show();

?>
