<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');
  require_once('../model/Annonce.class.php');
  require_once('../model/Utilisateur.class.php');

  $bdd = new DAOClass($config['database_path']);

  $annonce = $bdd->recupererAnnonceID($_GET['idAnnonce']);                    //Recupération des données liées a l'annonce
  $photos = $bdd->recupererPhotos($annonce->getId());
  $utilisateur = $bdd->recupererUtilisateur($annonce->getUtilisateur());

  if (isset($_GET['id_photo'])) {                                             //image a affiché sur la page
    $id_photo = $_GET['id_photo'];
  } else {
    $id_photo = 0;
  }

  $view = new View('annonce.view.php');
  $view->annonce = $annonce;
  $view->photos = $photos;
  $view->utilisateur = $utilisateur;
  $view->id_photo = $id_photo;
  $view->idAnnonce = $_GET['idAnnonce'];
  $view->show();

?>
